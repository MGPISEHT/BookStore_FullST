<!-- Edit Order Modal -->
@foreach ($orders as $order)
<div class="modal fade" id="editOrderModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOrderModalLabel">Edit Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user_id">User ID:</label>
                        <input type="number" name="user_id" value="{{ $order->user_id }}" id="user_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="order_number">Order Number:</label>
                        <input type="text" name="order_number" value="{{ $order->order_number }}" id="order_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="total_amount">Total Amount:</label>
                        <input type="number" name="total_amount" value="{{ $order->total_amount }}" id="total_amount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="failed" {{ $order->status == 'failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="shipping_address_id">Shipping Address ID:</label>
                        <input type="number" name="shipping_address_id" value="{{ $order->shipping_address_id }}" id="shipping_address_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_id">Payment ID:</label>
                        <input type="number" name="payment_id" value="{{ $order->payment_id }}" id="payment_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="shipping_method">Shipping Method:</label>
                        <input type="text" name="shipping_method" value="{{ $order->shipping_method }}" id="shipping_method" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach