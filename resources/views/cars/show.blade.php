@extends('layouts.app')

@section('content')

    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <img class="mb-8 w-8/12 shadow-xl" src="{{asset('images/' . $car->image_path)}}" alt="car image">
            <h1 class="text-5xl uppercase bold">
                {{$car->name}}
            </h1>
        </div>

        <div class="py-10 text-center">
            <span class="uppercase text-blue-500 font-bold text-xs italic">
                Founded : {{ $car->founded }}
            </span>
            <p class="text-lg text-gray-700 py-6">
                {{ $car->description }}
            </p>
            <table class="table-auto">
                <tr class="bg-blue-100">
                    <th class="w-1/4 border-4 border-gray-800">
                        Model
                    </th>
                    <th class="w-1/4 border-4 border-gray-800">
                        Engines
                    </th>
                    <th class="w-1/4 border-4 border-gray-800">
                        Date
                    </th>
                </tr>
                @forelse($car->carModels as $model)
                    <tr>
                        <td class="border-4 border-gray-500">
                            {{ $model->model_name }}
                        </td>

                        <td class="border-4 border-gray-500">
                            @foreach($car->engines as $engine)
                                @if($model->id == $engine->model_id)
                                    {{ $engine->engine_name}}
                                @endif
                            @endforeach
                        </td>

                        <td class="border-4 border-gray-500">
                            {{ date('d-m-y', strtotime($car->productionDate->created_at)) }}
                        </td>
                    </tr>
                @empty
                    <p>no car models found</p>
                @endforelse
            </table>
            <p class="text-center">
                        Product types:
                @forelse($car->products as $product)
                    {{ $product->name }},

                @empty
                    <h4>No car product description</h4>
                @endforelse
            </p>
            <hr class="mt-4 mb-8">
        </div>
    </div>



@endsection
