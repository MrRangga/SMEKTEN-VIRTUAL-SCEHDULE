<div class="footer">
        &copy Mr.Rangga 
    </div>
    {{-- <script> 
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $(document).on('click', 'a.jquery-postback', function(e) {
            e.preventDefault(); // does not go through with the link.
        
            var $this = $(this);
        
            $.post({
                type: $this.data('method'),
                url: $this.attr('href')
            }).done(function (data) {
                alert('success');
                console.log(data);
            });
        });
        </script>   --}}
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     
     <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>