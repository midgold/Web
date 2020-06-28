var brick_type = ['Термостат', 'Свет', 'Протечка', 'Управление светом', 'Влажность', 'Дым', 'Окно', 'Замок'];

let magicGrid = new MagicGrid({
  container: ".bricks_container",
  items: brick_type.length,
  animate: true,
  gutter: 10,
  maxColumns: (document.body.clientWidth > 768) ? 3 : 10,
});

magicGrid.listen();

var bricks = [
  {
    component: {
      template: '<div>Термостат</div>',
      template: '<div>Вёрстка для термостата</div>',
    }
  },
  {
    component: {
      template: '<div>Свет</div>',
      template: '<div>Вёрстка для света</div>'
    }
  }
]


new Vue({
  el: '',
  data: {
    bricks: [
      {
        template: '<div>Термостат</div>'
      },
      {
        template: '<div>Свет</div>'
      }
    ]
  }
})


var i = 0;

new Vue({
    el: ".bricks_container",
    data: {
       current_brick: bricks[0]
     },
     computed: {
      changed_brick: function () {
        setInterval(function() {
          if(i < bricks.length - 1) {
            i++;
            return this.current_brick = bricks[i];
          }
          else {
            i = 0;
            return this.current_brick = bricks[i];
          }
        }.bind(this), 1000);
      }
    }
});
