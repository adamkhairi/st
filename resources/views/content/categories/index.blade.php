@extends('layouts.app')



@section('content1')


    <div class="p-16 "></div>

<div id="header" class=" w-full  h-64">
        <h1 class=" text-center font-title text-5xl pt-24">categories</h1>
    </div>

    <table class="table-fixed">
  <thead>
    <tr>
      <th class="w-1/2 px-4 py-2">Name</th>
      <th class="w-1/4 px-4 py-2">Modifier</th>
      <th class="w-1/4 px-4 py-2">Supprimer</th>
    </tr>
  </thead>
  <tbody>
      @foreach($categories as $category)
    <tr>
      <td class="border px-4 py-2">{{$category->name}}</td>
       @auth()
                            @if(auth()->user()->is_admin)
      <td class="border px-4 py-2" >
           
                                        <a type="button" class="btn-gardiant rounded-full px-4 py-1"
                                           href="{{route('category.edit',$category->id)}}">
                                            UPDATE
                                        </a>
                                    
      <td class="border px-4 py-2">  
          <form action="{{ route('category.destroy',$category->id) }}" method="P0OST"
                                              enctype="multipart/form-data"
                                              onsubmit="return confirm('etes vous sur?');"
                                              >
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn-gardiant rounded-full px-4 py-1"
                                            >
                                                Delete
                                            </button>
                                        </form>
      </td>
       @endif
                        @endauth
    @endforeach
  </tbody>
</table>

   

@endsection
