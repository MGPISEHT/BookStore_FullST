<!-- Delete Shipping Address Modal -->
@foreach ($shipping_addresses as $shipping)

<div class="modal fade" id="deleteShippingAddressModal{{ $shipping->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteShippingAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="deleteShippingAddressForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteShippingAddressModalLabel">Delete Shipping Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to delete this shipping address?</p>
                    <input type="hidden" name="id" id="delete_id">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach