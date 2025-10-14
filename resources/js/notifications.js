// Notification System JavaScript
// Handles dynamic notifications, real-time updates, and toast notifications

class NotificationSystem {
    constructor() {
        this.notifications = [];
        this.notificationCount = 0;
        this.notificationsLoading = false;
        this.lastNotificationCount = 0;
        this.notificationOpen = false;

        this.init();
    }

    async init() {
        // Load initial notifications
        await this.loadNotifications();

        // Setup real-time updates
        this.initRealTimeNotifications();
    }

    async loadNotifications() {
        this.notificationsLoading = true;

        try {
            const response = await fetch("/admin/notifications", {
                method: "GET",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    Accept: "application/json",
                    "Content-Type": "application/json",
                },
                credentials: "same-origin",
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();

            if (data.success) {
                this.notifications = data.notifications;
                this.notificationCount = data.count;

                // Check for new notifications
                if (
                    this.notificationCount > this.lastNotificationCount &&
                    this.lastNotificationCount > 0
                ) {
                    const newNotifications = this.notifications.slice(
                        0,
                        this.notificationCount - this.lastNotificationCount
                    );
                    newNotifications.forEach((notification) => {
                        this.showToastNotification(notification);
                    });
                }

                this.lastNotificationCount = this.notificationCount;

                // Update UI
                this.updateNotificationUI();

                // Update Alpine.js data
                if (window.updateAlpineData) {
                    window.updateAlpineData();
                }
            } else {
                // Handle API error silently
            }
        } catch (error) {
            // Handle error silently
            this.notifications = [];
            this.notificationCount = 0;
        } finally {
            this.notificationsLoading = false;
            this.updateLoadingUI();
        }
    }

    async openNotification(notification) {
        // Mark notification as read
        await this.markAsRead(notification.id);

        // Navigate to notification URL
        if (notification.url) {
            window.location.href = notification.url;
        }
    }

    async markAsRead(notificationId) {
        try {
            const response = await fetch("/admin/notifications/mark-read", {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    Accept: "application/json",
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    notification_id: notificationId,
                }),
                credentials: "same-origin",
            });

            if (response.ok) {
                // Update local notification count
                if (this.notificationCount > 0) {
                    this.notificationCount--;
                }

                // Update UI
                this.updateNotificationUI();

                // Update Alpine.js data
                if (window.updateAlpineData) {
                    window.updateAlpineData();
                }
            }
        } catch (error) {
            // Handle error silently
        }
    }

    getNotificationIconBg(priority) {
        const priorityClasses = {
            urgent: "bg-red-100 dark:bg-red-900/20",
            high: "bg-orange-100 dark:bg-orange-900/20",
            medium: "bg-blue-100 dark:bg-blue-900/20",
            low: "bg-green-100 dark:bg-green-900/20",
            default: "bg-gray-100 dark:bg-gray-900/20",
        };
        return priorityClasses[priority] || priorityClasses["default"];
    }

    getPriorityBadgeClass(priority) {
        const badgeClasses = {
            urgent: "bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200",
            high: "bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200",
            medium: "bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200",
            low: "bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200",
            default:
                "bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200",
        };
        return badgeClasses[priority] || badgeClasses["default"];
    }

    initRealTimeNotifications() {
        try {
            // Check for new notifications every 15 seconds
            setInterval(async () => {
                if (!this.notificationOpen) {
                    await this.loadNotifications();
                }
            }, 15000);
        } catch (error) {
            // Handle error silently
        }
    }

    showToastNotification(notification) {
        // Create toast notification element
        const toast = document.createElement("div");
        toast.className =
            "fixed top-4 right-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg p-4 z-50 max-w-sm transform transition-all duration-300 ease-in-out";
        toast.style.transform = "translateX(100%)";

        toast.innerHTML = `
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="h-8 w-8 rounded-full ${this.getNotificationIconBg(
                        notification.priority
                    )} flex items-center justify-center">
                        <svg class="h-4 w-4 ${
                            notification.icon_color || "text-gray-600"
                        }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">${
                        notification.title
                    }</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">${
                        notification.message
                    }</p>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">${
                        notification.time
                    }</p>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <button onclick="this.parentElement.parentElement.parentElement.remove()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        `;

        document.body.appendChild(toast);

        // Animate in
        setTimeout(() => {
            toast.style.transform = "translateX(0)";
        }, 100);

        // Auto remove after 5 seconds
        setTimeout(() => {
            if (toast.parentElement) {
                toast.style.transform = "translateX(100%)";
                setTimeout(() => {
                    if (toast.parentElement) {
                        toast.remove();
                    }
                }, 300);
            }
        }, 5000);
    }

    updateNotificationUI() {
        // Update notification count badge
        const badge = document.querySelector(
            '[x-show="notificationCount > 0"]'
        );
        if (badge) {
            badge.style.display = this.notificationCount > 0 ? "block" : "none";
        }

        // Update notification count text
        const countText = document.querySelector(
            "[x-text=\"notificationCount + ' unread'\"]"
        );
        if (countText) {
            countText.textContent = `${this.notificationCount} unread`;
        }
    }

    updateLoadingUI() {
        const loadingElement = document.querySelector(
            '[x-show="notificationsLoading"]'
        );
        if (loadingElement) {
            loadingElement.style.display = this.notificationsLoading
                ? "block"
                : "none";
        }
    }

    // toggleNotificationDropdown is now handled by Alpine.js directly
}

// Initialize notification system when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    window.notificationSystem = new NotificationSystem();

    // Make functions globally available for Alpine.js
    window.loadNotifications = () => {
        return window.notificationSystem.loadNotifications();
    };

    window.openNotification = (notification) => {
        return window.notificationSystem.openNotification(notification);
    };

    window.getNotificationIconBg = (priority) => {
        return window.notificationSystem.getNotificationIconBg(priority);
    };

    window.getPriorityBadgeClass = (priority) => {
        return window.notificationSystem.getPriorityBadgeClass(priority);
    };

    window.showToastNotification = (notification) => {
        return window.notificationSystem.showToastNotification(notification);
    };

    window.toggleNotificationDropdown = () => {
        // This function is now handled by Alpine.js directly
        return true;
    };

    // Also expose the notification system data for Alpine.js
    window.getNotificationData = () => {
        return {
            notifications: window.notificationSystem.notifications,
            notificationCount: window.notificationSystem.notificationCount,
            notificationsLoading:
                window.notificationSystem.notificationsLoading,
            notificationOpen: window.notificationSystem.notificationOpen,
        };
    };

    // Update Alpine.js data when notifications change
    window.updateAlpineData = () => {
        const data = window.getNotificationData();
        // Find Alpine.js component and update its data
        const alpineComponent = document.querySelector("[x-data]");
        if (alpineComponent && alpineComponent._x_dataStack) {
            const alpineData = alpineComponent._x_dataStack[0];
            if (alpineData) {
                alpineData.notifications = data.notifications;
                alpineData.notificationCount = data.notificationCount;
                alpineData.notificationsLoading = data.notificationsLoading;
                alpineData.notificationOpen = data.notificationOpen;
            }
        }
    };
});

// Export for module usage
if (typeof module !== "undefined" && module.exports) {
    module.exports = NotificationSystem;
}
