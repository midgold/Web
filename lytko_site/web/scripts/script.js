let magicGrid = new MagicGrid({
  container: ".bricks_container",
  items: 6,
  animate: true,
  gutter: 10,
  maxColumns: 10,
});

magicGrid.listen();

var bricks_container = new Vue({
  el: '.bricks_container',
  data: {
     visible: true,
     target_degree: 25,
     current_degree: 23,
     bricks_text: [
       { type: 'Влажность', text: '26%'},
       { type: 'Температура', text: '25'}
     ],
     bricks_indicator: [
       {type: 'Протечка', header: 'Протечка воды', brick_cb: false},
       {type: 'Свет', header: 'Выключатель', brick_cb: true},
       {type: 'Дверь', header: 'Замок', brick_cb: true},
       {type: 'Дым', header: 'Задымление', brick_cb: false}
     ],
     bricks_managment: [
       {type: 'Управление светом', header: 'Управление светом'}
     ]
  },
  mounted() {
    axios
      .get('../db_interaction/display_goods.php')
      .then(response => (this.info = response));
  }
});

setInterval(function() {
  bricks_container.visible = !bricks_container.visible;
}, 5000);
