<div class="w-full flex flex-wrap justify-evenly sm:justify-center items-center">
    <div class="w-auto flex justify-center items-center bg-secondary-700 rounded-lg px-4 py-2 mt-1 mr-1">
        <el-tooltip placement="top">
            <div slot="content">
                <span>
                    Рецепты из категории {{ $post->category->name }}
                </span>
            </div>
            <a href="{{ route('posts.index', $post) }}">
                <span class="text-lg sm:text-xl text-primary-200 hover:text-primary-600">
                    {{ $post->category->name }}
                </span>
            </a>
        </el-tooltip>
    </div>
    <div class="w-auto flex justify-center items-center bg-secondary-700 rounded-lg px-4 py-2 mt-1 mr-1">
        <el-tooltip placement="top">
            <div slot="content">
                <span>
                    Рецепты из {{ $post->kitchen->name }}
                </span>
            </div>
            <a href="{{ route('posts.index', $post) }}">
                <span class="text-lg sm:text-xl text-primary-200 hover:text-primary-600">
                    {{ $post->kitchen->name }}
                </span>
            </a>
        </el-tooltip>
    </div>
    <div class="w-auto flex justify-center items-center bg-secondary-700 rounded-lg px-4 py-2 mt-1 mr-1">
        <el-tooltip placement="top">
            <div slot="content">
                <span>
                    Рецепты похожие рецепты блюда {{ $post->dish->name }}
                </span>
            </div>
            <a href="{{ route('posts.index', $post) }}">
                <span class="text-lg sm:text-xl text-primary-200 hover:text-primary-600">
                    {{ $post->dish->name }}
                </span>
            </a>
        </el-tooltip>
    </div>
    <div class="w-auto flex justify-center items-center bg-secondary-700 rounded-lg px-4 py-2 mt-1 mr-1">
        <el-tooltip placement="top">
            <div slot="content">
                <span>
                    Рецепты из категории {{ $post->menu->name }}
                </span>
            </div>
            <a href="{{ route('posts.index', $post) }}">
                <span class="text-lg sm:text-xl text-primary-200 hover:text-primary-600">
                    {{ $post->menu->name }}
                </span>
            </a>
        </el-tooltip>
    </div>
</div>
