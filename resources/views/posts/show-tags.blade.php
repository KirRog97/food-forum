<div class="row px-2">
    <div class="col-auto bg-dark rounded p-2 mx-1">
        <el-tooltip placement="top">
            <div slot="content">
                <span class="text-center">
                    Рецепты из категории {{ $post->category->name }}
                </span>
            </div>
            <a href="{{ route('posts.index', $post) }}">
                <h6 class="text-white p-1 m-0">{{ $post->category->name }}</h6>
            </a>
        </el-tooltip>
    </div>
    <div class="col-auto bg-dark rounded p-2 mx-1">
        <el-tooltip placement="top">
            <div slot="content">
                <span class="text-center">
                    Рецепты из {{ $post->kitchen->name }}
                </span>
            </div>
            <a href="{{ route('posts.index', $post) }}">
                <h6 class="text-white p-1 m-0">{{ $post->kitchen->name }}</h6>
            </a>
        </el-tooltip>
    </div>
    <div class="col-auto bg-dark rounded p-2 mx-1">
        <el-tooltip placement="top">
            <div slot="content">
                <span class="text-center">
                    Рецепты похожие рецепты блюда {{ $post->dish->name }}
                </span>
            </div>
            <a href="{{ route('posts.index', $post) }}">
                <h6 class="text-white p-1 m-0">{{ $post->dish->name }}</h6>
            </a>
        </el-tooltip>
    </div>
    <div class="col-auto bg-dark rounded p-2 mx-1">
        <el-tooltip placement="top">
            <div slot="content">
                <span class="text-center">
                    Рецепты из категории {{ $post->menu->name }}
                </span>
            </div>
            <a href="{{ route('posts.index', $post) }}">
                <h6 class="text-white p-1 m-0">{{ $post->menu->name }}</h6>
            </a>
        </el-tooltip>
    </div>
</div>
