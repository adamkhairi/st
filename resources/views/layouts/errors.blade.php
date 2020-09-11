<div class="w-full error fixed top-0 z-50 mt-4">
    @if ($message = Session::get('success'))

        <div class="alert-banner w-1/3 mx-auto my-1">
            <input type="checkbox" class="hidden" id="banneralert">
            <label
                class="close cursor-pointer flex items-center justify-between w-full p-2 bg-green-500 shadow text-white"
                title="close" for="banneralert">


                <span>{{ $message }}</span>


                <i class="fas fa-exclamation text-white mr-2"></i>
            </label>

        </div>

    @elseif($message = Session::get('error'))
        <div class="alert-banner w-1/3 mx-auto my-1">
            <input type="checkbox" class="hidden" id="banneralert">
            <label
                class="close cursor-pointer flex items-center justify-between w-full p-2 bg-red-500 shadow text-white"
                title="close" for="banneralert">


                <span>{{ $message }}</span>


                <i class="fas fa-exclamation text-white mr-2"></i>
            </label>

        </div>

    @endif
</div>

<div class="w-full error fixed top-0 z-50 mt-4">
    @if ($errors->any())
        @foreach ($errors->all() as $error)

            <div class="alert-banner w-1/3 mx-auto my-1">
                <input type="checkbox" class="hidden" id="banneralert">
                <label
                    class="close cursor-pointer flex items-center justify-between w-full p-2 bg-red-500 shadow text-white"
                    title="close" for="banneralert">


                    <span>{{ $error }}</span>


                    <i class="fas fa-exclamation text-white mr-2"></i>
                </label>

            </div>
        @endforeach

    @endif
</div>
