@if ($errors->any())
    <div {{ $attributes }}>
        <div class="px-4 py-2 rounded-lg text-sm bg-red-500 text-white">
            <div class="font-medium text-center ">{{ __('Email or password incorrect') }}</div>
        </div>
    </div>
@endif
