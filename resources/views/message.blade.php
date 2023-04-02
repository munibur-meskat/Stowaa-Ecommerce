
{{-- Font Awesome Free 5.15.1 by @fontawesome --}}

@if ($message = Session::get('success'))
  <div class="toast bg-success toast_custom" data-delay="5000">
    <div class="toast-body">
      <div style="display: flex">
        <i class="fas fa-thumbs-up"></i>
        <p>{{ $message }}</p>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  </div>
</div>  
@endif

@if ($message = Session::get('warning'))
  <div class="toast bg-warning toast_custom" data-delay="5000">
    <div class="toast-body">
      <div style="display: flex">
        <i class="fas fa-exclamation-triangle"></i>
        <p>{{ $message }}</p>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  </div>
</div>  
@endif

@if ($message = Session::get('danger'))
  <div class="toast bg-danger toast_custom" data-delay="5000">
    <div class="toast-body">
      <div style="display: flex">
        <i class="fas fa-skull-crossbones"></i>
        <p>{{ $message }}</p>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  </div>
</div>  
@endif

@if ($message = Session::get('info'))
  <div class="toast bg-info toast_custom" data-delay="5000">
    <div class="toast-body">
      <div style="display: flex">
        <i class="fas fa-info-circle"></i>
        <p>{{ $message }}</p>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  </div>
</div>  
@endif