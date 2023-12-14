  @extends("layouts.{$layout}")
  @section('title', 'products')
  @section('content')
  
    <h1>PRODUCTS</h1>
    <table>
      <tr>
        <td>id</td>
        <td>brand</td>
        <td>model</td>
      </tr>
      @foreach ($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->brand->name }}</td>
          <td>{{ $product->model->name }}</td>
        </tr>
      @endforeach  
    </table>
    

  @endsection
