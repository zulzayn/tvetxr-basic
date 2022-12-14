<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="text-center">
            <img src="{{ URL::asset('img/TVETXRlogo.png') }}" alt="" style="width:30rem">
        </div>
    
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
           
            @if ($errors->any())
                <div class="mb-4">
                    <div class="font-medium text-red-600">Whoops! Something went wrong.</div>
    
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
    
                <div>
                    <label class="block font-medium text-sm text-gray-700">
                        Name
                    </label>
                    <input class="block mt-1 w-full form-input rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                </div>
    
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700">
                        Email
                    </label>
                    <input class="block mt-1 w-full form-input rounded-md shadow-sm"  type="email" name="email" :value="old('email')" required >
                </div>
    
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700">
                        Password
                    </label>
                    <input class="block mt-1 w-full form-input rounded-md shadow-sm"  type="password" name="password" required autocomplete="new-password">
                </div>
    
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700">
                        Confirm Password
                    </label>
                    <input class="block mt-1 w-full form-input rounded-md shadow-sm"   type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
    
                
    
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        Already registered?
                    </a>
    
                    <button type='submit' class='ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'>
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
