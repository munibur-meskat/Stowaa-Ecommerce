@extends('layouts.backendapp')
@section('title', "All Product")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">All Product</li>
                </ol>
            </nav>
            <h1 class="m-0">All Product</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
<div class="row">
    <div class="col-lg-12">
    {{-- @can('can see category') --}}
        <div class="card">
          <div class="card-body">
            <table class="table">
                <tr style="background-color:#a1490a;color:azure">
                    <th>Id</th>
                    <th>Image</th>
                    <th width="200" >Product Categories</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Discount</th>
                    <th>Added By</th>
                    <th class="text-center">Action</th>
                </tr>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                        <img src="{{ asset('storage/products/' .$product->image) }}" alt="{{ $product->title }}" width="60">
                        </td>
                        <td width="100">
                            @foreach ($product->categories as $category)
                                <span class="badge badge-warning">{{ $category->name ?? "" }}</span>
                            @endforeach
                        </td>
                        <td>{{ Str::limit($product->title, 15, '...') }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>{{ $product->user->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('dashboard.inventory.index', $product->id) }}"><button type="button" class="btn btn-success m-1" style="font-size: 12px;border: none;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;">add inventory</button></a>

                            <a href="#"><button type="button" class="btn btn-primary m-1" style="font-size: 12px;border: none;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;">view</button></a>

                            <form action="{{ route('dashboard.product.destroy', $product->id) }}" method="POST" class="d-inline">
                                
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-danger delete_btn" style="font-size: 12px;border: none;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;">delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6"><p>{{ __("NO Category Found!") }}</p></td>
                    </tr>
                @endforelse
            </table>
          </div>
        </div>
        
        <div class="pagination_wrap">
            {{ $products->links('vendor.custom_pagination') }}
        </div>

        {{-- @endcan --}}
    </div>
</div>
</section>

@endsection

@section('footer-js')
    <script>
        $('.delete_btn').on('click',function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                     $(this).parent('form').submit();
                }
                })
        })
    </script>
@endsection