<!-- Add Order Modal -->
<div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrderModalLabel">Add Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user_id">User ID:</label>
                        <input type="number" name="user_id" id="user_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="order_number">Order Number:</label>
                        <input type="text" name="order_number" id="order_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="total_amount">Total Amount:</label>
                        <input type="number" name="total_amount" id="total_amount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="shipping_address_id">Shipping Address ID:</label>
                        <input type="number" name="shipping_address_id" id="shipping_address_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_id">Payment ID:</label>
                        <input type="number" name="payment_id" id="payment_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="shipping_method">Shipping Method:</label>
                        <input type="text" name="shipping_method" id="shipping_method" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Order</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>