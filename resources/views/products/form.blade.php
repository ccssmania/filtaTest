<form class="max-w-sm mx-auto" method="POST" action="{{ $edit ? route('products.update', $product->id) : route('products.store') }}" enctype="multipart/form-data">
	@csrf
	@method($edit ? 'PUT' : 'POST')
	<h1>{{ $edit ? 'Edit' : 'Create' }}</h1>
    <div class="mb-5">
    	<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
      	<input
			type="text"
			name="name"
			id="name"
			class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
			placeholder="example"
			
			value="{{ old('name', $product->name ?? '') }}"
		/>
		@error('name')
			<div class="alert alert-danger text-red-500">{{ $message }}</div>
		@enderror
    </div>
    <div class="mb-5">
      	<label for="Description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
      	<textarea
			name="description"
			id="Description"
			class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
			>{{ old('description', $product->description ?? '') }}</textarea>
		@error('description')
			<div class="alert alert-danger text-red-500">{{ $message }}</div>
		@enderror
    </div>
	<div class="mb-5">
    	<label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
      	<input
			type="number"
			name="price"
			id="price"
			class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
			placeholder="example"
			
			value="{{ old('price', $product->price ?? '') }}"
		/>
		@error('price')
			<div class="alert alert-danger text-red-500">{{ $message }}</div>
		@enderror
    </div>
	<div class="mb-5">
    	<label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
      	<input
			type="file"
			name="image"
			id="image"
			class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
			placeholder="example"

		/>
		@error('image')
			<div class="alert alert-danger text-red-500">{{ $message }}</div>
		@enderror
    </div>
    <div class="flex items-start mb-5">
      	<div class="flex items-center h-5">
        	<input
				id="product_of_the_day"
				name="product_of_the_day"
				type="checkbox"
				value="1"
				{{ old('product_of_the_day', $product->product_of_the_day ?? false) ? 'checked' : '' }}
				class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"

			/>
      	</div>
      	<label for="product_of_the_day" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product Of The Day</label>
			@error('product_of_the_day')
				<div class="alert alert-danger text-red-500">{{ $message }}</div>
			@enderror
    </div>

	<div class="mb-5">
		<label for="box_position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Box Position (Only applicable for product of the day)</label>
		<select
			class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
			name="box_position" id=""
		>
			<option value="">Select One</option>
			<option value="top" {{ old('box_position', $product->box_position ?? '') == 'top' ? 'selected' : '' }}>Top</option>
			<option value="top-start" {{ old('box_position', $product->box_position ?? '') == 'top-start' ? 'selected' : '' }}>Top Start</option>
			<option value="top-end" {{ old('box_position', $product->box_position ?? '') == 'top-end' ? 'selected' : '' }}>Top End</option>
			<option value="center" {{ old('box_position', $product->box_position ?? '') == 'center' ? 'selected' : '' }}>Center</option>
			<option value="center-start" {{ old('box_position', $product->box_position ?? '') == 'center-start' ? 'selected' : '' }}>Center Start</option>
			<option value="center-end" {{ old('box_position', $product->box_position ?? '') == 'center-end' ? 'selected' : '' }}>Center End</option>
			<option value="bottom" {{ old('box_position', $product->box_position ?? '') == 'bottom' ? 'selected' : '' }}>Bottom</option>
			<option value="bottom-start" {{ old('box_position', $product->box_position ?? '') == 'bottom-start' ? 'selected' : '' }}>Bottom Start</option>
			<option value="bottom-end" {{ old('box_position', $product->box_position ?? '') == 'bottom-end' ? 'selected' : '' }}>Bottom End</option>
		</select>
		@error('box_position')
		  <div class="alert alert-danger text-red-500">{{ $message }}</div>
	  	@enderror
  </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
  