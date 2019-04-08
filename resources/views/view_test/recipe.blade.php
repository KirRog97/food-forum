<div class="recipe">
    <div class="recipe-images">
        @slot('image_path')
        <img src="/images/recipes/{{$image_path}}" alt="Recipe_Photo" class="recipe-photo">
        @endslot
    </div>
    <div class="recipe-description">
        @slot('recipe_name')
        <h3 class="recipe-list-title">{{$title}}</h3>
        @endslot
        <div class="recipe-details">
            <div class="recipe-details-line"><img src="/images/icons/TimeToCook.ico" alt="TC" class="icon">
                @slot('TimeToCook')
            <span>{{$ttc}}</span>
                @endslot
            </div>
            <div class="recipe-details-line"><img src="/images/icons/CountOfPortions.ico" alt="Por" class="icon">
                @slot('CountOfPortions')
                <span>{{$count}}</span>
                @endslot
            </div>
            <div class="recipe-details-line"><img src="/images/icons/Kcal.svg" alt="K" class="icon">
                @slot('Kcal')
                <span>{{$Kcal}} Ккал</span>
                @endslot
            </div>
        </div>

    </div>
</div>
