@extends('layouts.app')
@section('content')


<div class="container">
        	<div class="meal-info">
		<h2 class="meal-name">{{$meal->name}}</h2>

		<span class="meal-time">
			Saturday, June 24th, 2017
		</span>

		<br>

		<span class="meal-data label label-pill label-primary">
			{{(($meal->foods->sum('protein'))*4)+(($meal->foods->sum('carbohydrate'))*4)+(($meal->foods->sum('fat'))*9)}}kCal
		</span>

		<span class="meal-data label label-pill label-default">
			{{$meal->foods->sum('protein')}}g Protein
		</span>

		<span class="meal-data label label-pill label-default">
			{{$meal->foods->sum('carbohydrate')}}g Carbohydrates
		</span>

		<span class="meal-data label label-pill label-default">
			{{$meal->foods->sum('fat')}}g Fat
		</span>
	</div>


	<hr>

	<h3>Foods</h3>

<ul class = "list-group">
  @foreach($meal->foods as $food )
     <li class ="list-group-item">
          <p> {{ $food->name }} {{ $food->carbohydrate}} </p>
      </li>
   @endforeach
 </ul>

	<hr>


	<form action="/meals/{{$meal->id}}/foods" method="post">

		<div class="form-group row">
			<label for="name" class="col-sm-2 form-control-label">Food Name</label>
			<div class="col-sm-10">
				<input class="form-control" 
						type="text" 
						name="name" 
						placeholder="Food Name"
						required
						>
			</div>
		</div>

		<div class="form-group row">
			<label for="protein" class="col-sm-2 form-control-label">Protein</label>
			<div class="col-sm-10">
				<input class="form-control" 
						type="number" 
						name="protein" 
						placeholder="Protein/g"
						required
						>
			</div>
		</div>

		<div class="form-group row">
			<label for="carbohydrates" class="col-sm-2 form-control-label">Carbohydrates</label>
			<div class="col-sm-10">
				<input class="form-control" 
						type="number" 
						name="carbohydrate" 
						placeholder="Carbohydrates/g"
						required
						>
			</div>
		</div>

		<div class="form-group row">
			<label for="fat" class="col-sm-2 form-control-label">Fat</label>
			<div class="col-sm-10">
				<input class="form-control" 
						type="number" 
						name="fat" 
						placeholder="Fat/g"
						required
						>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-offset-2 col-sm-10">
				<button class="btn btn-primary" value="submit" type="submit">Submit</button>
			</div>
		</div>
		{{ csrf_field() }}
	</form>

</div>

@endsection