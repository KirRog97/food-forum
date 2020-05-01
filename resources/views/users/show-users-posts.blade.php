<table class="table">
  <thead>
    <tr>
      <th class="text-center">Название блюда</th>
      <th class="text-center">Автор</th>
      @if ($user->hasOwnerRights($user->id))
      <th class="text-center">Редактирование</th>
      <th class="text-center">Удаление</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach ($user->posts as $post)
    <tr>
      <td class="text-center" scope="row"><a href="/posts/{{ $post->id }}">
          {{ $post->title }}
        </a>
      </td>
      <td class="text-center">{{ $user->username }}</td>
      @if ($user->hasOwnerRights($user->id))
      <td>
        <div class="d-flex justify-content-center">
          <el-tooltip placement="top">
            <div slot="content">
              <span class="text-center">Переход к редатированию рецепта</span>
              <br />
              <span class="text-danger">После нажатия происходит перенаправление</span>
            </div>
            <a href="{{ route('posts.edit', $post) }}">
              <el-button type="info" icon="el-icon-edit" circle> </el-button>
            </a>
          </el-tooltip>
        </div>
      </td>
      <td>
        <div class="d-flex justify-content-center">
          <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')

            <el-tooltip placement="top">
              <div slot="content">
                <span class="text-center">Удаление рецепта</span>
                <br />
                <span class="text-danger">
                  После удаления происходит перенаправление
                </span>
              </div>
              <el-button type="danger" icon="el-icon-delete" onclick="submit()" circle>
              </el-button>
            </el-tooltip>
          </form>
        </div>
      </td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
