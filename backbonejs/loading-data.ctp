<?php $this->startIfEmpty('script');?>
<?php echo $this->Html->script('http://underscorejs.org/underscore-min.js'); ?>
<?php echo $this->Html->script('http://backbonejs.org/backbone-min.js'); ?>
<?php $this->end();?>
<script>
$(function(){
  window.Album = Backbone.Model.extend({
    isFirstTrack: function(index) {
      return index == 0;
    },
    isLastTrack: function(index) {
      return index >= this.get('tracks').length - 1;
    }
  });

  window.Albums = Backbone.Collection.extend({
    model: Album,
    url: '/sitemap.json'
  });

  window.AlbumView = Backbone.View.extend({
    tag: 'li',

    className: 'album',

    initialize: function() {
      _.bindAll(this, 'render');
      this.model.bind('change', this.render);
      this.template = _.template($('#album-template').html());
    },

    render: function() {
      var renderedContent = this.template(this.model.toJSON());
      $(this.el).html(renderedContent);
      return this;
    }
  });

  window.LibraryAlbum = AlbumView.extend({

  });

  window.LibraryView = Backbone.View.extend({
    tagName: 'section',
    className: 'library',
    initialize: function(){
      _.bindAll(this, 'render');
      this.template = _.template($('#library-template').html());
      this.collection.bind('reset', this.render);
    },
    render: function() {
      var $albums,
          collection = this.collection;
      $(this.el).html(this.template({}));
      $albums = this.$('.albums');
      collection.each(function(album){
        var view = new LibraryAlbumView({
          model: album,
          collection: collection
        });
        $albums.append(view.render().el);
      });
      return this;
    }
  });


});
</script>
<script type='text/template' id='library-template'>
  <h1>Library</h1>
  <ul class='albums'>
    <li></li>
  </ul>
</script>
<script type='text/template' id='album-template'>
  <% _.each()
  <span><%= location%></span>
  <span><%= lastmod%></span>
</script>
<div class="offset1 span10" id="container"></div>