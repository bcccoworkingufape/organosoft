<x-guest-layout>
    <x-login-card>
        <x-slot name="logo">
    <a name="logo" href="{{route('welcome')}}" class="text-2xl">
                <!-- <img src="#" alt="Organosoft"> -->
                OrganoSoft
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-form-control>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </x-form-control>

            <x-form-control class="w-full">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </x-form-control>

            <x-form-control class="w-full">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </x-form-control>

            <x-form-control class="w-full">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </x-form-control>

            <x-form-control class="w-full">
                <x-label for="fabrica_id" value="Fábrica: "></x-label>
                <x-select name="fabrica_id" id="fabrica_id">
                    <option value="" disabled {{ !old('fabrica_id') ? 'selected' : '' }}>Selecione uma opção</option>
                    @foreach($fabricas as $fabrica)
                        <option value="{{ $fabrica->id }}" {{ old('fabrica_id') && old('fabrica_id') == $fabrica->id ? 'selected' : '' }}>
                            {{ $fabrica->nome }}
                        </option>
                    @endforeach
                </x-select>
            </x-form-control>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-login-card>
</x-guest-layout>
