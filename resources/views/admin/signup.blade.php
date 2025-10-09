@extends('layouts.admin')

@section('title', 'Sign Up')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <img class="mx-auto h-12 w-auto" src="{{ asset('images/logo.jpg') }}" alt="Logo">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">
        Create your account
      </h2>
      <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
        Or
        <a href="{{ route('admin.signin') }}" class="font-medium text-brand-600 hover:text-brand-500">
          sign in to your existing account
        </a>
      </p>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST">
      <div class="space-y-4">
        <div>
          <label for="first-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
          <input id="first-name" name="first-name" type="text" required class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white" placeholder="First name">
        </div>
        <div>
          <label for="last-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
          <input id="last-name" name="last-name" type="text" required class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white" placeholder="Last name">
        </div>
        <div>
          <label for="email-address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white" placeholder="Email address">
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
          <input id="password" name="password" type="password" autocomplete="new-password" required class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white" placeholder="Password">
        </div>
        <div>
          <label for="confirm-password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
          <input id="confirm-password" name="confirm-password" type="password" autocomplete="new-password" required class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-brand-500 focus:border-brand-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white" placeholder="Confirm password">
        </div>
      </div>

      <div class="flex items-center">
        <input id="agree-terms" name="agree-terms" type="checkbox" required class="h-4 w-4 text-brand-600 focus:ring-brand-500 border-gray-300 rounded">
        <label for="agree-terms" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
          I agree to the <a href="#" class="text-brand-600 hover:text-brand-500">Terms and Conditions</a>
        </label>
      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-brand-500 group-hover:text-brand-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11.14 5.293a1 1 0 00-1.28 1.28l.5 2a1 1 0 00.5.5l2 .5a1 1 0 001.28-1.28l-.5-2a1 1 0 00-.5-.5l-2-.5z" clip-rule="evenodd" />
            </svg>
          </span>
          Create account
        </button>
      </div>
    </form>
  </div>
</div>
@endsection