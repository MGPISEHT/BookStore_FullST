<!-- Add Payment Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('payments.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPaymentModalLabel">Add Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="order_id">Order ID:</label>
                        <input type="text" name="order_id" id="order_id" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="payment_method">Payment Method:</label>
                        <input type="text" name="payment_method" id="payment_method" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="transaction_id">Transaction ID:</label>
                        <input type="text" name="transaction_id" id="transaction_id" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="payment_date">Payment Date:</label>
                        <input type="datetime-local" name="payment_date" id="payment_date" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Payment</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
