<x-layout>

    @include('pages.sidebar')
    @include('components.Orders.orderAdd')
    @include('components.Orders.orderEdit')
    @include('components.Orders.orderDelete')

    <section class="main_content dashboard_part large_header_bg">
        @include('pages.header')

        <div class="table-data">
            <div class="d-flex justify-content-between align-items-center flex-wrap p-3">
                <h1>Orders</h1>
                <div class="serach_field-area d-flex align-items-center justify-content-between">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addOrderModal">Add New Order</button>
                    <div class="search_inner ml-4">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" placeholder="Search Orders..." />
                            </div>
                            <button type="submit">
                                <img src="{{ url('img/icon/icon_search.svg') }}" alt />
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container-fluid p-2">
                <table class="table p-4" id="orderTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Order #</th>
                            <th>User ID</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Shipping Address ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ $order->shipping_address_id }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editOrderModal{{ $order->id }}">Edit</button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteOrderModal{{ $order->id }}">Delete</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">No orders found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @include('pages.footer')
    </section>

</x-layout>