<!-- Update Payment Modal -->
@foreach($payments as $payment)
<div class="modal fade" id="editPaymentModal{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="editPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('payments.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPaymentModalLabel">Update Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="order_id">Order ID:</label>
                        <input type="text" name="order_id" id="order_id" class="form-control" value="{{ $payment->order_id }}" required>
                    </div>

                    <div class="form-group">
                        <label for="payment_method">Payment Method:</label>
                        <input type="text" name="payment_method" id="payment_method" class="form-control" value="{{ $payment->payment_method }}" required>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ $payment->amount }}" required>
                    </div>

                    <div class="form-group">
                        <label for="transaction_id">Transaction ID:</label>
                        <input type="text" name="transaction_id" id="transaction_id" class="form-control" value="{{ $payment->transaction_id }}" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $payment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="failed" {{ $payment->status == 'failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="payment_date">Payment Date:</label>
                        <input type="datetime-local" name="payment_date" id="payment_date" class="form-control" value="{{ \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d\TH:i') }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Payment</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
