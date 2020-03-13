<?php

use App\Picture;
use App\Ingredient;
use Faker\Generator as Faker;

$arrayOfIngredients = ['Ирга', 'Ириски', 'Йогурт', 'Йод', 'Кабачок', 'Какао сгущенное', 'Какао тертое', 'Какао-бобы', 'Какао-масло', 'Какао-напиток', 'Какао-порошок', 'Кактус', 'Калина', 'Калинджи', 'Кальвадос', 'Кальмар', 'Камбала', 'Кампари', 'Каннеллони', 'Каперсы', 'Капуста белокочанная', 'Капуста брюссельская', 'Капуста квашеная', 'Капуста китайская', 'Капуста кольраби', 'Капуста краснокочанная', 'Капуста кудрявая', 'Капуста морская', 'Капуста пекинская', 'Капуста савойская', 'Капуста цветная', 'Капучино', 'Каракатица', 'Карамболь', 'Карамель', 'Карась', 'Карбонад', 'Кардамон', 'Каркаде', 'Карп', 'Карри', 'Картофель', 'Катык', 'Каша', 'Питахайя', 'Повидло', 'Полба', 'Полуфабрикаты', 'Помело', 'Померанец', 'Помидор', 'Помидор маринованный', 'Помидор соленый', 'Помидоры черри', 'Попкорн', 'Порошок горчичный', 'Порошок грибной', 'Порошок луковый', 'Порошок пекарский', 'Порошок томатный', 'Порошок чесночный', 'Портулак', 'Посыпка кондитерская', 'Потроха', 'Почки', 'Пралине', 'Пресервы', 'Приправа', 'Простокваша', 'Профитроли', 'Пряник', 'Пряности', 'Псиллиум', 'Пудинг', 'Пудинг ванильный', 'Пудинг карамельный', 'Путассу', 'Пшеница', 'Пшено', 'Пыльца цветочная', 'Пюре картофельное', 'Пюре овощное', 'Пюре томатное', 'Пюре фруктовое', 'Пюре ягодное', 'Равиоли', 'Разрыхлитель теста', 'Раки', 'Раковые шейки', 'Ракушки', 'Рамбутан', 'Рапаны', 'Рассол', 'Рахат-лукум', 'Ребра', 'Ребра говяжьи', 'Ребра свиные', 'Ревень', 'Редис', 'Редька', 'Репа', 'Рикотта', 'Рис', 'Рис воздушный', 'Рис дикий', 'Рис коричневый', 'Рисовая бумага', 'Рожки', 'Розмарин', 'Ром', 'Романо', 'Ростки',  'Свекла', 'Свекла листовая', 'Свинина', 'Свити', 'Сельдерей корневой', 'Сельдерей листовой', 'Сельдерей черешковый', 'Сельдь', 'Семга', 'Семена', 'Семена горчицы', 'Семена льна', 'Семена укропа', 'Семечки', 'Семечки подсолнуха', 'Семечки тыквенные', 'Семолина', 'Сердечки куриные', 'Сердце', 'Сетка жировая', 'Сибас', 'Сидр', 'Сироп', 'Сироп абрикосовый', 'Сироп алкогольный', 'Сироп ананасовый', 'Сироп ванильный', 'Сироп глюкозы', 'Сироп инвертный', 'Сироп кленовый', 'Сироп клубничный', 'Сироп клюквенный', 'Сироп кокосовый', 'Сироп кукурузный', 'Сироп лимонный', 'Сироп миндальный', 'Сироп мятный', 'Смородина черная', 'Снеки', 'Соба', 'Сода', 'Сода гашеная уксусом', 'Соевые проростки', 'Соевый соус', 'Сок', 'Сок апельсиновый', 'Сок березовый', 'Сок гранатовый', 'Сок лимонный', 'Сок мандариновый', 'Сок морковный', 'Сок свежевыжатый', 'Сок томатный', 'Сок яблочный', 'Сок ягодный', 'Солод', 'Соломка', 'Соль', 'Соль нитритная', 'Сосиска', 'Соус', 'Соус майонезный', 'Соус томатный', 'Соус устричный', 'Соус фруктовый', 'Соус ягодный', 'Соус-маринад', 'Соя', 'Спагетти', 'Спаржа', 'Специи', 'Стевия', 'Стрелки чесночные', 'Стружка кокосовая', 'Стружка шоколадная', 'Субпродукты', 'Сумах', 'Сунели', 'Суп пакетный', 'Суповой набор', 'Сусло квасное', 'Сухари', 'Сухари панировочные', 'Сухарики', 'Сухой завтрак', 'Сухофрукты', 'Сушки', 'Сыворотка', 'Сыр адыгейский', 'Сыр голландский', 'Сыр голубой', 'Сыр козий', 'Сыр копченый', 'Сыр мягкий', 'Сыр плавленый', 'Сыр полутвердый', 'Сыр сливочный', 'Сыр сулугуни', 'Табаско', 'Тарталетка', 'Тартар', 'Тархун', 'Творог', 'Творожная масса', 'Текила', 'Теин', 'Толокно', 'Томатная паста', 'Томаты в собственном соку', 'Томаты вяленые', 'Томаты пассерованные', 'Томаты протертые', 'Томаты сушеные', 'Тоник', 'Топинамбур', 'Тосты', 'Тофу', 'Треска', 'Трюфель', 'Тунец', 'Тушенка', 'Тыква', 'Угорь', 'Удон', 'Укроп', 'Уксус', 'Уксусная эссенция', 'Улитки', 'Улучшитель хлебопекарный', 'Фрукты', 'Фундук', 'Фунчоза', 'Халва', 'Халва подсолнечная', 'Хамон', 'Хамса', 'Хвост', 'Хвоя', 'Хек', 'Херес', 'Хлеб', 'Хлебобулочные изделия', 'Хлебцы', 'Хлопья гороховые', 'Хлопья гречневые', 'Хлопья злаковые', 'Хлопья картофельные', 'Хлопья кукурузные', 'Хлопья овсяные', 'Хлопья панировочные', 'Хлопья пшенные', 'Хлопья рисовые', 'Хлопья шоколадные', 'Хлопья ячменные', 'Хлорид кальция', 'Хмель', 'Хрен', 'Хурма', 'Цветки', 'Цедра апельсина', 'Цедра грейя', 'Черника', 'Чернила каракатицы', 'Чернослив', 'Чеснок', 'Чечевица', 'Шампанское', 'Шампиньоны', 'Шафран', 'Шейка куриная', 'Шейка свиная', 'Шелковица', 'Шелуха луковая', 'Шиповник', 'Шишки сосновые', 'Шкура свиная', 'Шнитт-лук', 'Шоколад белый', 'Шоколад молочный', 'Шоколад темный', 'Шпиг', 'Шпинат', 'Шпроты', 'Шрот', 'Щавель', 'Щука', 'Яблоко', 'Язык говяжий', 'Язык свиной', 'Яйцо перепелиное', 'Ячмень'];

$factory->define(Ingredient::class, function (Faker $faker) use ($arrayOfIngredients) {
    return [
        'description'  =>   $faker->paragraphs(5, true),
        'picture_id'   =>   factory(Picture::class)->create(),
        'name'         =>   $faker->unique()->randomElement($arrayOfIngredients)
    ];
});
