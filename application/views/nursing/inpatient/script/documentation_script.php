<script type="text/javascript">
	
  ////// Dialog for Adding New Ward
  function anc_dialog(event) {

    event.preventDefault();
    var element = $(event.currentTarget);
    var url = element.attr('href');
    var title = element.data('title');
    var size = element.data('size');

////
   var admitDialog = $.confirm({
        title: 'Prompt!',
        columnClass:size,
        content: function () {
                  var self = this;
                  return $.ajax({
                      url: url,
                      method: 'get',
                  }).done(function (data) {
                      self.setContent(data);
                      self.setTitle(title);
                  }).fail(function(){
                      self.setContent('Something went wrong');
                  });
              },
        buttons: {
            Close: function () {
                //close
                //return false;
            },
        },
        onContentReady: function () {

                              // $('.card a').click(function(e) {

                              //     $('.card.active-menu').removeClass('active-menu');

                              //     var $parent = $(this).parent();
                              //     //console.log($parent)
                              //     $parent.addClass('active-menu');
                              //     e.preventDefault();
                              // });

            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function (e) {

                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });

}


</script>