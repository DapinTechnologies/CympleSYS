<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
           
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            
           
            {{-- <div class="overflow-hidden relative w-64 mt-4 mb-4">
                <button class="bg-indigo hover:bg-indigo-dark text-white font-bold py-2 px-4 w-full inline-flex items-center">
                    {{-- <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                    </svg> --}}
                    {{-- <span class="ml-2">Last opp bilder (max 3)</span> --}}
                {{-- </button>
                <input class="cursor-pointer absolute block opacity-0 pin-r pin-t" type="file" name="vacancyImageFiles" @change="fileName" multiple>
            </div> --}} 

              


            {{-- <div class=" mt-4 flex justify-between">  
        
                <a href="" class="flex-row bg-blue-500 font-bold text-white px-0 py-0 transition duration-300 ease-in-out hover:bg-blue-600 mr-6">
                    Facebook
                </a>
                <img class="w-12" src="utility/fb logo.png">
                <a href="" class="bg-red-500 font-bold text-white px-6 py-3 transition duration-300 ease-in-out hover:bg-blue-600 mr-6">
                    Google <img class="w-15" src="utility/Google logo.png">
                </a>
                    
                    {{-- <a href="#" class="">Facebook <img class="w-15" src="utility/fb logo.png"> </a> --}}
                    {{-- <a href="#" class="flex flex-wrap border"></a> --}}
            {{-- </div> --}} 
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
            <h3 class="text-center pt-2 pb-1">OR Use</h3>
            <hr>
            <div class="flex pt-2 space-x-5 ml-9">
                <button class="border bg-blue-500 font-bold text-white transition duration-300 ease-in-out hover:bg-blue-700 font-bold text-white bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
                    {{-- " px-6 py-3 transition duration-300 ease-in-out hover:bg-blue-600 mr-6 --}}
                    {{-- <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg> --}}
                    <img class="w-8 h-6 mr-1" src="utility/fb logo.png">
                    <span>Facebook</span>
                  </button>
                  <button class="bg-red-500 font-bold text-white transition duration-300 ease-in-out hover:bg-red-700 font-bold text-whitetext-white border bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
                    {{-- <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg> --}}
                    <img class="w-8 h-6 mr-2" src="utility/Google logo.png">
                    <span>Google</span>
                  </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
