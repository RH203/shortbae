<div class="max-w-lg mx-auto mt-20 p-6 border rounded-lg shadow-sm text-center space-y-4">
  <h2 class="text-xl font-semibold">Email Verification Required</h2>

  <p class="text-gray-700">
    You haven't verified your email address yet.
  </p>

  <p class="text-gray-700">
    Please verify your email to access all features.
  </p>

  <a href="{{ route('profile') }}" class="underline text-blue-600 hover:text-blue-800" wire:navigate>
    Go to Profile to Resend Verification Email
  </a>
</div>
