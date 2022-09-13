@extends('layouts.admin')
@section('content')
<h2>Список новостей</h2>
<a href="{{ route('admin.items.create') }}" 
        style="float:right;" class="btn btn-primary">
        Добавить новость
</a>
<br>
<br>
      <div class="table-responsive">

        @include('inc.message')

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Наименование</th>
              <th scope="col">Категория</th>
              <th scope="col">Источник новостей</th>
              <th scope="col">Автор</th>
              <th scope="col">Статус</th>
              <th scope="col">Дата добавления</th>
              <th scope="col">Управление</th>
            </tr>
          </thead>
          <tbody>
            @forelse($newsList as $news)
            <tr>
              <td>{{ $news->id }}</td>
              <td>{{ $news->title }}</td>
              <td>{{ $news->category->title }}</td>
              <td>{{ $news->source->title }}</td>
              <td>{{ $news->author }}</td>
              <td>{{ $news->status }}</td>
              <td>{{ $news->created_at->format('d-m-Y H:i') }}</td>
              <td>
                <a href="{{ route('admin.items.edit', ['item'=> $news]) }}" class="btn btn-linkt btn-sm">Ред.</a> &nbsp; 
                <a data-id="{{ $news->id }}" href="javascript::" class="delete btn btn-linkt btn-sm" style="color: red"; rel="{{ $news->id }}">Уд.</button> 
            </tr>
            @empty
                <tr>
                    <td colspan="6">Записей не найдено</td>
                </tr>    
            @endforelse
          </tbody>
        </table>
          {{ $newsList->links() }}
      </div>
@endsection

@push('js')
  <script type="text/javascript">
    let id
    $('.delete').click(function(e) {
      e.preventDefault()

      id = $(this).attr('data-id')

      $.ajax({
        url: `/admin/items/${id}`,
        data: {
          '_token': '{{ csrf_token() }}'
        },
        type: 'DELETE',
        success: function(response) {
          location.reload()
        },
        error: function(response) {
          alert("Удаление отменено")
        }
      })
    })
    // document.addEventListener("DOMContentLoaded", function() {
    //   let elements = document.querySelectorAll(".delete");
    //   elements.forEach(function(e, k) {
    //     e.addEventListener("click", function() {
    //       const id = e.getAttribute('rel');
    //       if(confirm(`Подтвердите удаление записи с #ID = ${id}`)) {
    //         send(`/admin/news/${id}`).then(()=> {
    //           location.reload();
    //         });
    //       }else{
    //         alert("Удаление отменено");
    //       }
    //     })
    //   });
    // });

    async function send(url) {
      let response = await fetch(url, {
        method:'DELETE',
        data: {
            '_token' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'id' : id
        },
        // headers: {
        //   'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        // }
      });

      let result = await response.json();
      return result.ok;
    }
  </script>
@endpush