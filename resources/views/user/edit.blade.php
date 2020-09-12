<form action="{{ route('users.update',$user) }}" class="w-full" method="POST" enctype="multipart/form-data">
    <div class="flex flex-col justify-center items-center">
    {{ method_field('patch') }}
        <!--                Username *******-->
        <div class="flex items-center justify-center">
            <label class="text-gray-100 pr-6 p-2" for="name">Nom d'utilisateur</label>
            <span class="px-2 text-white">:</span>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}">

        </div>

        <!--                Email *******-->
        <div class="flex items-center justify-center">
            <label class="text-gray-100 pr-6 p-2" for="email">Email</label>
            <span class="px-2 text-white">:</span>
            <input type="text" name="email" id="age" value="{{ Auth::user()->email }}">

        </div>

        <!--                birthday *******-->
        <div class="flex items-center justify-center">
            <label class="text-gray-100 pr-6 p-2" for="birthday">Age</label>
            <span class="px-2 text-white">:</span>
            <input type="date" name="birthday" id="birthday" value="{{ Auth::user()->birthday }}">
        </div>


        <!--                Sex *******-->
        {{-- 0 === Female--}}
        {{-- 1 === Male --}}

        <div class="flex items-center justify-center">
            <label class="text-gray-100 pr-6 p-2" for="genre">Sex</label>
            <span class="px-2 text-white">:</span>
            <select name="genre" id="genre">
                <option selected value="1">Male</option>
                <option value="0">Female</option>
            </select>

        </div>


        <!--                Address *******-->
        <div class="flex items-center justify-center">
            <label for="address" class=" text-gray-100 pr-6 p-2 leading-5">Adresse Postale</label>
            <span class="px-2 text-white">:</span>
            <input type="text" name="address" id="address" value="{{ $user->address }}">
        </div>

        <div>
            <button type="submit"  class="btn-gardiant px-5 py-2 ">Update</button>
        </div>
    </div>
</form>
