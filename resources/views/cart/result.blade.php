<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
   h1 {
    margin-right: 55px; 
   }
  </style>
    <h1>Заказ размещен</h1>

    <p>Ваш заказ успешно размещен. Наш менеджер скоро свяжется с Вами для уточнения деталей.</p>

    <h2>Ваш заказ</h2>
    <table width="10 px" class="table table-borderless">
        <tr>
            <th>№</th>
            <th>Наименование</th>
            <th>Цена</th>
            <th>Кол-во</th>
        </tr>
        @foreach($cartCollection as $item)
        <tr>
            <td>1</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="4" class="text-right">Итого</th>
            <th>${{$sum}}</th>
        </tr>
    </table>

    



