@extends('layouts.admin')

@section('title', 'Calendar')

@section('content')
<!-- Breadcrumb Start -->
<div x-data="{ pageName: `Calendar`}">
  @include('admin.partials.breadcrumb')
</div>
<!-- Breadcrumb End -->

<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
  <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-6">
    Calendar
  </h3>
  
  <div id="calendar" class="h-96"></div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener("alpine:init", () => {
  Alpine.data("calendar", () => ({
    init() {
      // Initialize FullCalendar
      const calendarEl = document.getElementById('calendar');
      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
          {
            title: 'Meeting',
            start: '2024-01-15',
            backgroundColor: '#465fff',
            borderColor: '#465fff'
          },
          {
            title: 'Conference',
            start: '2024-01-20',
            end: '2024-01-22',
            backgroundColor: '#12b76a',
            borderColor: '#12b76a'
          }
        ]
      });
      calendar.render();
    }
  }));
});
</script>
@endsection