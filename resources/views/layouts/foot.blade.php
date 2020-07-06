<script>
  window.Auth={!! json_encode(['signedin'=>Auth::check(),'username'=>Auth::user()])!!}
</script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('/js/jquery-3.3.1.js') }}" type="text/javascript" ></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"  type="text/javascript" ></script>
