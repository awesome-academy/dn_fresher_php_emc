@if (Session::has(config('setting.key_add_cart')) || Session::has(config('setting.key_update_cart')))
    @php $keyMessage = Session::has('add_cart') ? config('setting.key_add_cart') : config('setting.key_update_cart'); @endphp
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('messages.notification')}}</h5>
                </div>
                <div class="modal-body">
                    {{ Session::get($keyMessage)}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('messages.close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endif
