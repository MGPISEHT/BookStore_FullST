@foreach($payments as $payment)
<!-- Delete Payment Modal -->
<div class="modal fade" id="deletePaymentModal{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="deletePaymentModalLabel{{ $payment->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('payments.delete', $payment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePaymentModalLabel{{ $payment->id }}">Delete Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to delete the payment of <strong>${{ $payment->amount }}</strong> made on <strong>{{ \Carbon\Carbon::parse($payment->payment_date)->format('F j, Y H:i') }}</strong>?</p>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach