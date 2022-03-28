-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 08:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_name` varchar(100) NOT NULL,
  `recipe_description` text NOT NULL,
  `recipe_category` varchar(100) NOT NULL,
  `recipe_prep_time` int(11) NOT NULL,
  `recipe_cook_time` int(11) NOT NULL,
  `recipe_servings` int(11) NOT NULL,
  `recipe_image` varchar(100) NOT NULL,
  `recipe_posted` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `user_id`, `recipe_name`, `recipe_description`, `recipe_category`, `recipe_prep_time`, `recipe_cook_time`, `recipe_servings`, `recipe_image`, `recipe_posted`) VALUES
(1, 1, 'Binagoongang Talong', 'It is a glorious array of garlic, onions, vinegar, chili pepper, eggplant, and of course, the unmistakable bagoong alamang or fermented shrimp paste. While on its own, bagoong alamang is able to bring richness to a dish, it gets even better with these flavorful ingredients. This is how it is able to hype up a seemingly simple dish in eggplant or talong. We stew sliced eggplants in these components to make it shine.', 'Main Dish', 5, 30, 4, 'binagoongang-talong.jpg', 'Yes'),
(2, 2, 'Longsilog', 'True to its name, longsilog is a breakfast that consists of sweet pork (longanisa), savory eggs, and umami garlic rice! Without even laying eyes on it, longsilog’s smell wafting through your home is enough to drag even the sleepiest out of bed. Its tantalizing aroma and humble yet comforting appearance, however, aren’t what make this dish special. In fact, it’s longsilog’s simple yet flavorful taste that is the star of the show!', 'Main Dish', 5, 30, 3, 'longsilog.jpg', 'Yes'),
(3, 3, 'Air Fryer Crispy Pata', 'Everyone has their preference of favorite Filipino dishes when the yearly gatherings arrive. For some, it might be lumpia, or perhaps leche flan for others. But one dish that often tops the list is an irresistible plate of juicy Crispy Pata. Every bit as audibly crunchy as its name states, this is definitely a meal that could give all your other crispy favorites a run for their money. Not only that, but it is sprinkled with peppercorn, bay leaves, garlic and more in seasonings. These essentially add some flavor to that crunch. But if you’ve tried making the deep-fried classic, I suggest you also give Air Fryer Crispy Pata a shot! While some are hesitant about just how much crunch an air fryer can bring to your meat, I can tell you now that we don’t cut back on any delicious crispiness with this method. In fact, you get just about as much of that crunch with an air fryer, but with loads less oil. And because of this, you consume less calories and fat for a bit of a healthier twist.', 'Main Dish', 5, 70, 3, 'air-fryer-crispy-pata.jpg', 'Yes'),
(4, 4, 'Pork Caldereta', 'Pork Caldereta is a Filipino tomato based stew. It is composed of cubed pork , potato, carrots, tomato sauce,and  liver spread. There are also regions in the Philippines that makes use of peanut butter. One of the great things about food is its ever-evolving nature, and how it usually adjusts to the place where it is eaten. As such, did you know that our favorite Caldereta is actually a local adaptation of a Spanish dish? But like many of the recipes we’ve grown to love and adopt in our cuisine, this dish has faced many adjustments. And not only is it fitted to our local palate, but it’s also used ingredients more accessible to us, hence the birth of Pork Caldereta. ', 'Main Dish', 5, 65, 5, 'pork-caldereta.jpg', 'No'),
(5, 5, 'Nilagang Baka', 'For a dish you can directly translate into English with the phrase “boiled beef,” you probably wouldn’t expect Nilagang Baka to be a delicious balance of flavors. From the soft and satisfying texture of baby bok choy to the ever tender and rich cubes of beef sirloin, this recipe only intermingles the best ingredients for an ever comforting dish. Perhaps one of the reasons why it is so popular is because like many other famous Filipino recipes, it puts together a good deal of meat, vegetables and stew. But one of the major factors of appeal for Nilagang Baka is that it boasts a generally mild flavor that is far from overpowering. While a great deal of savory Filipino dishes show off a strong taste, this has subtle notes of savor in its beef broth, salt and pepper. It makes use of sim  ple seasonings to bring the best out of its many ingredients.', 'Main Dish', 10, 72, 6, 'nilagang-baka.jpg', 'Yes'),
(6, 5, 'Fried Ham and Cheese Roll', 'Fried Ham and Cheese Roll is an easy snack or appetizer. It tastes really good and it also has that crisp and crunchy texture on the outside. This recipe is simple and inexpensive. Kids love it!', 'Appetizer', 10, 7, 4, 'fried-ham-and-cheese-roll.jpg', 'Yes'),
(7, 1, 'Dynamite Lumpia', 'Dynamite Lumpia is a version of the popular Filipino deep-fried egg rolls. This version is unique because it involves the use of stuffed long green chili. The idea is somewhat similar to chile relleno, except that the stuffed chili peppers are wrapped in lumpia wrapper and deep fried until golden brown and crispy.', 'Appetizer', 8, 20, 4, 'dynamite-lumpia.jpg', 'Yes'),
(8, 2, 'Bacon Wrapped Sea Scallop', 'One of the simplest appetizer that I enjoy eating (and making) is Bacon Wrapped Sea Scallop. It is yummy and has a balanced flavor. The marriage between the bacon and scallop always works out great. In  addition, it is easy to prepare. In fact, this recipe is intended for beginners.', 'Appetizer', 10, 18, 4, 'bacon-wrapped-sea-scallop.jpg', 'Yes'),
(9, 3, 'Cheesy Crab and Corn Nachos', 'Cheesy Crab and Corn Nachos is a perfect appetizer especially if you are out for a drink or two. It is cheesy, very tasty, and has a little bit of spice that will tickle your taste buds. I like to consume it while it is still freshly hot from the oven.', 'Appetizer', 10, 20, 3, 'cheesy-crab-and-corn-nachos.jpg', 'Yes'),
(10, 4, 'Crispy Bagbagis', 'Bagbagis is an Ilokano term that refers to intestine. Crispy bagbagis are deep fried pork intestine that are so crispy and crunchy. This dish also goes by the names crispy isaw and chicharon bituka. It is a perfect match for a cold bottle of beer.', 'Appetizer', 30, 50, 5, 'crispy-bagbagis.jpg', 'Yes'),
(11, 5, 'Pandesal', 'We often hear about how convenient it is to start with a blank canvas– to work with the simplest elements in order to create something entirely new and vibrant. I could say that this does not only apply to art, as this works also in the field of cooking. Some of the most exciting food to work with are those with a level of simplicity to them that make them the perfect base for something delightful and tasty. And a dish that runs right along these lines perfectly is the most popular Filipino bread there is. Read on if you’re interested in a most fluffy, and simply tasty Pandesal recipe. And alongside this, read about some trivia on the beloved bread!', 'Appetizer', 90, 15, 8, 'pandesal.jpg', 'Yes'),
(12, 1, 'Leche Flan', 'Leche Flan is a dessert made-up of eggs and milk with a soft caramel on top. It resembles crème caramel and caramel custard. This delicious dessert is known throughout the world.It has been a regular item in the  menu of most restaurants because of its taste, ease in preparation and long shelf life. It can also be added as a component to build other great tasting dessert creations. Leche Flan is the top dessert in the Philippines. The dining table won’t be complete without it especially during celebrations such as parties and town fiestas. I remember the Leche Flan that my Lola Belen makes when I was still living in Las Pinas. It really tasted so rich and heavenly. Everyone in our clan always request her to prepare it during special occasions.  I’m  lucky because my wife knows how to do a good one too. This is actually her recipe. If I did it my way, you might be having Leche Flan that tastes like Egg Pie instead.', 'Dessert', 10, 45, 6, 'leche-flan.jpg', 'Yes'),
(13, 2, 'Peach Mango Nuggets', 'Peach Mango Nuggets makes a great dessert or snack. These are mini versions of peach mango pie which are deep fried until golden brown and crispy. It is easy-to-make, affordable, and delicious!', 'Dessert', 10, 5, 3, 'peach-mango-nuggets.jpg', 'No'),
(14, 3, 'Buko Pandan', 'Buko Pandan is a popular Filipino Dessert made using young coconut,  pandan leaves (or Screwpine leaves), and sago pearls. At first glance, this dessert dish can be mistaken for Buko Salad. Both desserts are almost similar visually.', 'Dessert', 10, 10, 4, 'buko-pandan.jpg', 'Yes'),
(15, 4, 'Biko', 'Sticky, chewy, and oh so sweet, biko is a delicious treat that Filipinos all across the world enjoy. Biko is a type of sticky rice cake, otherwise known as kakanin. With a combination of coconut milk and brown sugar, biko is a delicious dessert or merienda to share with your loved ones! You can often find biko at birthday parties, fiestas, holiday parties, and family reunions, usually with other sticky rice treats.', 'Dessert', 10, 40, 8, 'biko.jpg', 'Yes'),
(16, 5, 'Mayo Brownies', 'Mayo Brownies is a simple brownie recipe that makes use of mayonnaise. The mayo helps make it moist and rich. Traditionally butter or vegetable oil is used to provide moisture for brownies and cakes. I simply love how moist these brownies are. It makes it perfect for dessert or for snacking.', 'Dessert', 10, 20, 6, 'mayo-brownies.jpg', 'Yes'),
(17, 1, 'Spicy Sotanghon Chicken Soup', 'Infused with various seasonings and vegetables, this dish is a soup of tasty, delectable solace that most people love to have on sick days. The heat rising from this soup also makes it perfect for particularly colder days, such as the rainy season.', 'Soup', 12, 45, 5, 'spicy-sotanghon-chicken-soup.png', 'Yes'),
(18, 2, 'Chicken Sotanghon Soup with Malunggay and Sayote', 'Healthy dishes can also be delicious. Chicken Sotanghon Soup with Malunggay at Sayote is a good example. This dish is packed with nutrients and it tastes good too. ', 'Soup', 10, 35, 4, 'chicken-sotanghon-soup-with-malunggay-and-sayote.png', 'Yes'),
(19, 3, 'Chicken Asparagus Soup Recipe', 'Chicken Asparagus Soup is another good recipe to cook. You might have tried some of our asparagus recipes such as asparagus soup and asparagus salad. This soup dish is also good and easy to prepare.\r\n', 'Soup', 10, 40, 4, 'chicken-asparagus-soup-recipe.png', 'Yes'),
(20, 4, 'Chicken Sotanghon Soup', 'Chicken Sotanghon Soup is a Filipino version of chicken noodle soup. This soup dish makes use of shredded chicken and sotanghon noodles. It also has carrots and cabbage. Adding roasted garlic, scallions, and seasoning with fish sauce makes it stand out.', 'Soup', 20, 18, 4, 'chicken-sotanghon_-soup.png', 'Yes'),
(21, 5, 'Soup Number 5', 'Soup Number 5 is a type of exotic soup. It is composed of the bull’s sex organs, mainly the penis and the testes. I will refer to these as bat and balls throughout the article and the recipe.', 'Soup', 10, 20, 6, 'soup-number-5.png', 'Yes'),
(22, 1, 'Chicken Macaroni Salad', 'Filipino Chicken Macaroni Salad spells the holidays for me. It is a sign that Christmas is just around the corner. I grew-up having this festive salad every Christmas dinner. This practice is still maintained in our household. We all help make the salad and enjoy it together as family.', 'Salad', 10, 35, 8, 'chicken-macaroni-salad-recipe.png', 'Yes'),
(23, 2, 'Chicken Potato Salad', 'Make Chicken Potato Salad at home with the entire family! It is a good way to forge bonding between each other. Imagine making a delicious and easy dish while having fun and building camaraderie at the same time. Perfect, isn’t it?', 'Salad', 10, 35, 4, 'chicken-potato-salad-recipe.png', 'Yes'),
(24, 3, 'Chicken and Egg Macaroni Salad', 'Chicken and Egg Macaroni Salad is a holiday favorite. This is something that my family serve during Christmas and special occasions. The good thing about this mac salad, aside from tasting great, is its ease in preparation. Everything can be completed within 30 minutes.', 'Salad', 5, 12, 6, 'chicken-and-egg-macaroni-salad.png', 'Yes'),
(25, 4, 'Macaroni Fruit Salad', 'Macaroni Fruit Salad is a favorite Filipino dessert during the holidays and special occasions. This is not your typical macaroni salad. It is more of a dessert rather than a side dish. It is sweet, creamy, and heavenly.', 'Salad', 5, 10, 4, 'macaroni-fruit-salad.png', 'Yes'),
(26, 5, 'Easy Classic Macaroni Salad', 'I live for the weekend. This easy classic macaroni salad  is something that I always look forward to. It is best paired with grilled dishes such as inihaw na liempo or pork chop. I also enjoy this with chicken inasal.', 'Salad', 5, 10, 4, 'easy-classic-macaroni-salad.png', 'Yes'),
(29, 1, 'Adboooooo', 'Sample', 'Main Dish', 20, 20, 4, 'promos_samg_logo.png', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredient`
--

CREATE TABLE `recipe_ingredient` (
  `recipe_ingredient_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `recipe_ingredient_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe_ingredient`
--

INSERT INTO `recipe_ingredient` (`recipe_ingredient_id`, `recipe_id`, `recipe_ingredient_text`) VALUES
(1, 1, '2 pieces eggplant sliced'),
(2, 1, '4 pieces chili pepper chopped'),
(3, 1, '3 1/2 tablespoons bagoong alamang'),
(4, 1, '3 cloves garlic chopped'),
(5, 1, '1 piece onion chopped'),
(6, 1, '1 piece tomato diced'),
(7, 1, '1 teaspoon brown sugar'),
(8, 1, '1 tablespoon vinegar'),
(9, 1, '4 tablespoons cooking oil'),
(10, 1, '3 ounces pork optional'),
(11, 1, '3/4 cup water'),
(12, 1, 'Ground black pepper to taste'),
(13, 2, '1/2 lb. skinless longanisa'),
(14, 2, '2 pieces eggs'),
(15, 2, '4 cups rice leftover'),
(16, 2, '5 cloves garlic crushed'),
(17, 2, '1/2 cup water'),
(18, 2, '4 tablespoons cooking oil'),
(19, 2, 'Salt and ground black pepper to taste'),
(20, 3, '3 piece whole pork hock pata'),
(21, 3, '9 pieces dried bay leaves'),
(22, 3, '6 pieces star anise'),
(23, 3, '3 piece onion wedged'),
(24, 3, '9 cloves garlic crushed'),
(25, 3, '6 tablespoons white vinegar'),
(26, 3, '3 tablespoon whole peppercorn'),
(27, 3, '9 tablespoons cooking oil'),
(28, 3, 'Salt and ground black pepper to taste'),
(29, 4, '2 lbs. Pork sliced into cubes'),
(30, 4, '1 piece Knorr Pork cube'),
(31, 4, '8 oz. tomato sauce'),
(32, 4, '3/4 cup green olives'),
(33, 4, '1 piece red bell pepper sliced'),
(34, 4, '1 piece green bell pepper sliced'),
(35, 4, '2 pieces potatoes cubed'),
(36, 4, '2 pieces carrot sliced'),
(37, 4, '1 piece onion chopped'),
(38, 4, '3 cloves garlic chopped'),
(39, 4, '1 1/2 cups water'),
(40, 4, '1/2 cup liver spread'),
(41, 4, '3 tablespoons cooking oil'),
(42, 4, 'Salt and ground black pepper to taste'),
(43, 5, '2 lbs. beef sirloin cubed'),
(44, 5, '2 bunches baby bok choy or pechay'),
(45, 5, '1 piece cabbage'),
(46, 5, '6 pieces Saba banana halved'),
(47, 5, '4 pieces baking potato quartered'),
(48, 5, '1 piece white onion halved'),
(49, 5, '4 staks celery chopped'),
(50, 5, '1 piece star anise'),
(51, 5, '4 cups beef broth'),
(52, 5, '4 cups water'),
(53, 5, 'Salt and pepper to taste'),
(54, 6, '8 slices bread'),
(55, 6, '4 ounces ham sliced into thick strips'),
(56, 6, '3 ounces cheese sliced into thick strips'),
(57, 6, '1/4 cup pimento optional'),
(58, 6, '3/4 cup Panko bread crumbs'),
(59, 6, '2 pieces eggs beaten'),
(60, 6, '2 cups cooking oil'),
(61, 6, '1/2 cup mayonnaise'),
(62, 7, '8 pieces long green pepper'),
(63, 7, '4 ounces cheddar cheese'),
(64, 7, '8 pieces lumpia wrapper'),
(65, 7, '2 cups cooking oil'),
(66, 7, '6 ounces ground pork'),
(67, 7, '1 piece onion minced'),
(68, 7, '3 cloves garlic crushed and minced'),
(69, 7, '1 piece egg'),
(70, 7, '2 tablespoons cooking oil'),
(71, 7, 'Salt and ground black pepper to taste'),
(72, 8, '9 to 12 pieces large sea scallops'),
(73, 8, '9 to 12 strips of bacon'),
(74, 8, '1 teaspoon garlic powder'),
(75, 8, '14 teaspoon salt'),
(76, 8, '1/4 cup unsalted butter sliced into small cubes'),
(77, 8, '2 teaspoons minced flat leaf parsley'),
(78, 9, '1 large bag blue tortilla chips'),
(79, 9, '1 lb. fresh crab meat'),
(80, 9, '1 cup whole kernel corn canned'),
(81, 9, '1 cup shredded sharp cheddar cheese'),
(82, 9, '4 tablespoons cup green onion chopped'),
(83, 9, '1 cup shredded sharp cheddar cheese'),
(84, 9, '1/4 cup all-purpose flour'),
(85, 9, '2 cups fresh milk'),
(86, 9, '1 10 oz. can chopped tomato with green chilies, drained'),
(87, 9, '1/4 cup butter'),
(88, 9, '1/4 teaspoon salt'),
(89, 9, '1/8 teaspoon cayenne pepper powder'),
(90, 10, '2 lbs. pre-cleaned pork large intestines'),
(91, 10, '5 tablespoons coarse rock salt'),
(92, 10, '5 pieces dried bay leaves dahon ng laurel'),
(93, 10, '1 tablespoon whole peppercorn'),
(94, 10, 'Water for boiling'),
(95, 10, '3 cups cooking oil'),
(96, 11, '2 cups all purpose flour'),
(97, 11, '2 cups bread flour'),
(98, 11, '1/2 cup white sugar'),
(99, 11, '5 tbsp butter melted'),
(100, 11, '1 tsp baking powder'),
(101, 11, '1 1/4 cup fresh milk warm'),
(102, 11, '1 pouch rapid rise yeast'),
(103, 11, '1 tsp salt'),
(104, 11, '1 cup bread crumbs'),
(105, 11, '1 piece raw egg'),
(106, 11, '1 tbsp cooking oil'),
(107, 12, '10 pieces eggs'),
(108, 12, '1 can condensed milk (14 oz)'),
(109, 12, '1 cup fresh milk or evaporated milk'),
(110, 12, '1 cup granulated sugar'),
(111, 12, '1 teaspoon vanilla extract'),
(112, 13, '3 pieces mango ripe'),
(113, 13, '7 ounces peaches canned'),
(114, 13, '3 tablespoons brown suga'),
(115, 13, '1 teaspoon cornstarch'),
(116, 13, '1/4 teaspoon cinnamon powder'),
(117, 13, '5 slices loaf bread'),
(118, 13, '2 pieces eggs'),
(119, 13, '1/2 cup Panko breadcrumbs'),
(120, 13, '1 1/2cups cooking oil'),
(121, 14, '1 1/2 cup young coconut cut into strips'),
(122, 14, '5 ounces condensed milk'),
(123, 14, '8 ounces Table cream or all-purpose cream'),
(124, 14, '3 ounces powdered gelatin'),
(125, 14, '1 1/4 cups water'),
(126, 14, '6 drops Buko Pandan flavoring'),
(127, 14, '2 scoops vanilla ice cream optional'),
(128, 14, '1/2 cup sago pearls cooked (optional)'),
(129, 15, '2 cups glutinous rice aka sticky rice or malagkit'),
(130, 15, '1 1/2 cups water'),
(131, 15, '2 cups brown sugar'),
(132, 15, '4 cups coconut milk'),
(133, 15, '1/2 tsp salt'),
(134, 16, '1 cup all-purpose flour'),
(135, 16, '10 tablespoons Lady\'s Choice Mayonnaise'),
(136, 16, '3 tablespoons dark cocoa powder'),
(137, 16, '1/2 cup walnuts chopped'),
(138, 16, '3/4 cup granulated white sugar'),
(139, 16, '1/2 teaspoon salt'),
(140, 16, '1 teaspoon baking soda'),
(141, 16, '1/2 cup chocolate chips'),
(142, 16, '2 pieces eggs'),
(143, 16, '1 teaspoon vanilla extract'),
(144, 17, '1 1/2 lb. chicken cut into serving pieces'),
(145, 17, '1 piece Knorr Chicken Cube'),
(146, 17, '2 stalks lemongrass chopped'),
(147, 17, '1 piece red onion sliced'),
(148, 17, '8 pieces Thai chili pepper'),
(149, 17, '2 cloves garlic'),
(150, 17, '2 thumbs ginger'),
(151, 17, '1 tablespoon patis'),
(152, 17, '1/2 cup green onions sliced'),
(153, 17, '2 ounces sotanghon'),
(154, 17, '4 cups water'),
(155, 17, '1/4 teaspoon ground white pepper'),
(156, 17, '3 tablespoons cooking oil'),
(157, 18, '1 lb. Chicken breast'),
(158, 18, '1 piece Knorr Chicken Cube'),
(159, 18, '1.3 oz. Sotanghon'),
(160, 18, '11/2 cups malunggay leaves'),
(161, 18, '1 piece sayote sliced'),
(162, 18, '1 piece onion chopped'),
(163, 18, '8 cloves garlic crushed'),
(164, 18, '3 tablespoons cooking oil'),
(165, 18, '8 cups water'),
(166, 18, 'Patis and ground black pepper to taste'),
(167, 19, '1 lb. chicken breast'),
(168, 19, '1 piece Knorr Chicken Cube'),
(169, 19, '10 pieces asparagus cut into pieces'),
(170, 19, '1 1/2 cups spinach'),
(171, 19, '1 piece onion chopped'),
(172, 19, '4 cloves garlic chopped'),
(173, 19, '3 tablespoons cooking oil'),
(174, 19, '2 quarts water'),
(175, 19, 'Salt and ground black pepper to taste'),
(191, 21, '2 lbs. Ox bat and balls'),
(192, 21, '2 bunches lemongrass'),
(193, 21, '1 set sibot herb mix'),
(194, 21, '3 pieces Thai chili pepper optional'),
(195, 21, '3 tablespoons green onion chopped'),
(196, 21, '3 thumbs ginger julienne'),
(197, 21, '2 pieces onions sliced'),
(198, 21, '8 cloves garlic crushed and chopped'),
(199, 21, '12 cups water'),
(200, 21, '2 cups beef broth'),
(201, 21, '2 teaspoons cornstarch'),
(202, 21, '2 teaspoons granulated white sugar'),
(203, 21, '1/8 teaspoon ground black pepper'),
(204, 21, '3 tablespoons fish sauce patis'),
(205, 21, '3 tablespoons cooking oil'),
(206, 22, '1 lb. boneless chicken breast'),
(207, 22, '1 lb elbow macaroni'),
(208, 22, '1 1/2 cups Lady\'s Choice Mayonnaise'),
(209, 22, '1 can pineapple chunks 20 oz'),
(210, 22, '1 1/2 cups shredded cheddar cheese'),
(211, 22, '1 bottle pimiento 6.5 oz chopped'),
(212, 22, '1 cup carrot chopped'),
(213, 22, '1 piece green bell pepper chopped'),
(214, 22, '1 cup raisins'),
(215, 22, '1/4 cup sweet relish'),
(216, 22, '1/2 teaspoon garlic powder'),
(217, 22, '3 teaspoons salt this will be used when boiling chicken and macaroni, and as a seasoning'),
(218, 22, '1/4 teaspoon ground black pepper'),
(219, 22, 'Water for boiling'),
(220, 23, '8 ounces chicken breast boneless'),
(221, 23, '1 1/4 cups Lady\'s Choice Mayonnaise'),
(222, 23, '4 pieces potato'),
(223, 23, '1 piece carrot'),
(224, 23, '1 cup green peas frozen'),
(225, 23, '2 1/2 tablespoons sweet relish'),
(226, 23, '1/2 teaspoon onion powder'),
(227, 23, '1/2 cup sharp cheddar cheese shredded'),
(228, 23, '1/2 teaspoon sugar'),
(229, 23, '1/4 teaspoon ground black pepper'),
(230, 23, 'Salt to taste'),
(231, 23, 'Water for boiling'),
(232, 24, '6 ounces boneless chicken breast'),
(233, 24, '1 1/2 cups Lady’s Choice Mayonnaise'),
(234, 24, '2 cups elbow macaroni'),
(235, 24, '3/4 cups raisins'),
(236, 24, '5 ounces cheddar cheese cubed'),
(237, 24, '1/2 cup pineapple chunks optional'),
(238, 24, '3 pieces eggs boiled and cubed'),
(239, 24, '1 piece onion minced'),
(240, 24, '3 tablespoons parsley chopped'),
(241, 24, '1/2 teaspoon sugar'),
(242, 24, '1/4 teaspoon ground black pepper'),
(243, 24, '1/4 teaspoon salt'),
(244, 25, '2 cups elbow macaroni'),
(245, 25, '15 ounces fruit cocktail'),
(246, 25, '1/2 cup red kaong'),
(247, 25, '1/2 cup green kaong'),
(248, 25, '6 ounces cheese cubed'),
(249, 25, 'Dressing ingredients:'),
(250, 25, '1 1/4 cups Lady’s Choice Mayonnaise'),
(251, 25, '10 ounces condensed milk'),
(252, 25, '7 ounces table cream'),
(253, 25, 'a pich of salt'),
(269, 20, '1 1/2 lbs. chicken breast'),
(270, 20, '1 piece Knorr Chicken Cube'),
(271, 20, '2 1/2 ounces sotanghon noodles'),
(272, 20, '7 cups water'),
(273, 20, '1 piece dried bay leaves'),
(274, 20, '1 1/2 cups cabbage shredded'),
(275, 20, '1 piece carrot julienne'),
(276, 20, '1/2 cup scallions chopped'),
(277, 20, '2 stalks celery chopped'),
(278, 20, '1 piece onion chopped'),
(279, 20, '5 cloves garlic minced'),
(280, 20, '2 tablespoons garlic roasted'),
(281, 20, 'Fish sauce and ground black pepper to taste'),
(282, 20, '3/4 cups annatto water'),
(283, 20, '3 tablespoons cooking oil'),
(284, 26, '2 1/4 cups elbow macaroni'),
(285, 26, '3 pieces boiled eggs peeled and cubed'),
(286, 26, '2 stalks celery chopped'),
(287, 26, '1 piece bell pepper chopped'),
(288, 26, '3/4 cup frozen green peas'),
(289, 26, '4 ounces cheddar cheese cubed'),
(290, 26, '1 piece red onion chopped'),
(291, 26, '1 tablespoon parsley chopped'),
(292, 26, 'Salad dressing:'),
(293, 26, '1 cup Lady\'s Choice Mayonnaise'),
(294, 26, '1 tablespoon Dijon mustard'),
(295, 26, '2 tablespoons sweet relish'),
(296, 26, 'Salt and ground black pepper to taste'),
(314, 29, 'awdawd\r\n/n awdawd\r\n/n awdwad\r\n/n awdwad'),
(315, 29, 'awd'),
(316, 29, 'awd'),
(317, 29, 'awd'),
(318, 29, '321'),
(319, 29, '321'),
(320, 29, '321'),
(321, 29, '321');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_post`
--

CREATE TABLE `recipe_post` (
  `recipe_post_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_post_time` varchar(100) NOT NULL,
  `recipe_post_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe_post`
--

INSERT INTO `recipe_post` (`recipe_post_id`, `recipe_id`, `user_id`, `recipe_post_time`, `recipe_post_date`) VALUES
(10, 22, 1, '17:38', 'July 22, 2021'),
(11, 24, 3, '17:38', 'July 22, 2021'),
(12, 25, 4, '17:39', 'July 22, 2021'),
(13, 26, 5, '17:40', 'July 22, 2021'),
(14, 23, 2, '17:40', 'July 22, 2021'),
(15, 15, 4, '17:41', 'July 22, 2021'),
(16, 20, 4, '17:41', 'July 22, 2021'),
(17, 2, 2, '17:41', 'July 22, 2021'),
(18, 8, 2, '17:42', 'July 22, 2021'),
(19, 1, 1, '17:42', 'July 22, 2021'),
(20, 12, 1, '17:42', 'July 22, 2021'),
(21, 7, 1, '17:42', 'July 22, 2021'),
(22, 3, 3, '17:43', 'July 22, 2021'),
(23, 19, 3, '17:43', 'July 22, 2021'),
(24, 9, 3, '17:43', 'July 22, 2021'),
(25, 5, 5, '17:43', 'July 22, 2021'),
(26, 6, 5, '17:44', 'July 22, 2021'),
(27, 11, 5, '17:44', 'July 22, 2021'),
(28, 21, 5, '17:44', 'July 22, 2021'),
(29, 17, 1, '17:45', 'July 22, 2021'),
(30, 18, 2, '17:45', 'July 22, 2021'),
(31, 14, 3, '17:45', 'July 22, 2021'),
(32, 10, 4, '17:46', 'July 22, 2021'),
(33, 16, 5, '17:46', 'July 22, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_step`
--

CREATE TABLE `recipe_step` (
  `recipe_step_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `recipe_step_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe_step`
--

INSERT INTO `recipe_step` (`recipe_step_id`, `recipe_id`, `recipe_step_text`) VALUES
(1, 1, 'Heat oil in a cooking pot. Fry eggplant for 1 ½ minute per side. Remove from the pan. Set aside.'),
(2, 1, 'Using remaining oil, sauté garlic until it turns light brown. Add onion and tomato. Continue sautéing until the onion softens.'),
(3, 1, 'Add pork and chili pepper. Cook until the pork turns light brown.'),
(4, 1, 'Add bagoong alamang. Cook for 1 minute.'),
(5, 1, 'Pour water and vinegar into the pot. Let boil. Continue cooking for 3 to 5 minutes.'),
(6, 1, 'Add fried eggplant. Stir and cook for 1 ½ minutes.'),
(7, 1, 'Season with ground black pepper and sugar.'),
(8, 1, 'Transfer to a serving bowl. Serve. Share and enjoy!'),
(9, 2, 'Heat 2 tablespoons of oil in a pan. Once the oil gets hot, fry the eggs. Remove from the pan. Set aside.'),
(10, 2, 'Add remaining oil in the pan. Fry the longanisa until the outer part turns light brown (around 1 1/2 minutes).'),
(11, 2, 'Pour-in water. Let boil. Continue boiling until the water evaporates. Fry the longanisa in remaining oil until fully cooked. Remove from the pan and set aside.'),
(12, 2, 'Using the remaining oil, cook garlic until it starts to turn light brown.'),
(13, 2, 'Add rice. Stir-fry for 3 minutes. Season with salt and ground black pepper.'),
(14, 2, 'Assemble the fried eggs, longanisa, and sinangag on a plate. Serve with spicy vinegar as a dipping sauce for the longanisa.'),
(15, 2, 'Share and enjoy!'),
(16, 3, 'Combine pork hock, garlic, bay leaves, star anise, whole peppercorn, onion, and salt in a wide cooking pot. Add water until the pork hocks are fully submerged. Cover and let it boil. Adjust heat to low and continue boiling for 60 to 90 minutes or until the pork gets tender.'),
(17, 3, 'Remove pork hock from the pot. Let it cool down. Rub vinegar all over followed by salt and ground black pepper. Let it air dry for at least 6 hours (note: you may also soak it under the sun or dehydrate in the air fryer for 3 hours).'),
(18, 3, 'Rub cooking oil all over the pork hock. Place it in an air fryer and air-fry at 450F for 15 minutes. Adjust the temperature to 350F and continue air frying for 10 minutes.'),
(19, 3, 'Remove from the air fryer and arrange in a serving plate. Serve with spicy vinegar dipping sauce.'),
(20, 3, 'Share and enjoy!'),
(21, 4, 'Heat the oil in a cooking pot.'),
(22, 4, 'Once the oil gets hot, saute the garlic and onion.'),
(23, 4, 'Add the pork. Saute until the color turns light brown.'),
(24, 4, 'Pour-in the tomato sauce and water. Let boil. Cover and cook in low heat for 60 minutes.'),
(25, 4, 'Add the liver spread. Stir and cook for 3 minutes.'),
(26, 4, 'Put-in the potato and carrot. Cover and cook for 8 to 10 minutes.'),
(27, 4, 'Add the olives and bell peppers. Cook for 5 minutes.'),
(28, 4, 'Season with salt and ground black pepper.'),
(29, 4, 'Turn-off the heat. Transfer to a serving plate.'),
(30, 4, 'Serve. Share and enjoy'),
(31, 5, 'Combine the water and beef broth in a large cooking pot. Bring to a boil.'),
(32, 5, 'Add the onion, star anise, and celery. Reduce the heat in medium. Cover the pot and continue to boil for 20 minutes.'),
(33, 5, 'Remove the onion, star anise, and celery from the boiling liquid using a skimmer or a strainer. You can discard these ingredients.'),
(34, 5, 'Add the beef. Simmer for 60 to 90 minutes or until the beef becomes tender. You can add more water if necessary.'),
(35, 5, 'Put-in the saba banana and potatoes. Cook for 10 minutes.'),
(36, 5, 'Add the bok choy and cabbage. Sprinkle salt and pepper. Stir.'),
(37, 5, 'Cover and turn the heat off. Let the pot stay with cover-on for 2 to 5 minutes to cook the vegetables.'),
(38, 5, 'Transfer to a serving bowl.'),
(39, 5, 'Serve. Share and enjoy!'),
(40, 6, 'Remove the dark ends of the sliced bread.'),
(41, 6, 'Heat the cooking oil in a cooking pot.'),
(42, 6, 'Place the bread slices in a zip lock bag. Flatten using a rolling pin.'),
(43, 6, 'Spread mayonnaise on the flatten piece of bread'),
(44, 6, 'Arrange the ham, cheese, and pimento strips on the bread. Roll the bread until the filling is covered. Secure with a toothpick.'),
(45, 6, 'Dip the rolled bread in beaten egg. Place the Panko bread crumbs in a large Ziploc bag and then put the dipped rolls in. Shake until everything is covered with crumbs.'),
(46, 6, 'Fry in low to medium heat until the color turns golden brown (about 5 to 7 minutes).'),
(47, 6, 'Arrange the fried rolls in a plate line with paper towels.'),
(48, 6, 'Serve as a snack or slice into pieces and serve as an appetizer.'),
(49, 6, 'Share and enjoy!'),
(50, 7, 'Prepare the ground pork stuffing by heating 3 tablespoons oil in a pan. Saute garlic and onion until the latter softens. Add ground pork. Saute until medium brown. Season with salt and ground black pepper. Remove from the pan and put on a large bowl. Let it cool down. Beat 1 piece of egg and pour into the cooked ground pork. Mix well. Set aside.'),
(51, 7, 'Slice one side of the peppers lengthwise all the way to the bottom. Remove the seeds by gently scraping using a small spoon or a butter knife. Set aside.'),
(52, 7, 'Slice the cheddar cheese into long pieces. Stuff individual slices of cheese into each pepper. Sccop the cooked meat mixture and stuff into the chili peppers. Make sure that there is enough meat.'),
(53, 7, 'Wrap the stuffed peppers in lumpia wrapper.'),
(54, 7, 'Heat 2 cups of oil in a pan. Fry each piece of dynamite lumpia in medium heat for 2 minutes per side or until lumpia wrapper turns golden brown. Note: you may fry longer if needed.'),
(55, 7, 'Remove from pan and place over a wire rack. Let it cool down. Arrange in a serving plate and then serve with your favorite condiment.\r\nShare and enjoy!'),
(56, 8, 'Preheat oven to 375F'),
(57, 8, 'Place the scallops in a bowl. Add garlic powder and salt. Rub all over the scallops.'),
(58, 8, 'Wrap 1 strip of bacon on the sides of a scallop. Secure by inserting a toothpick into the scallop. Do this step until all the scallops are wrapped with bacon.'),
(59, 8, 'Arrange the bacon wrapped scallops on a baking tray. Bake for 15 to 18 minutes.'),
(60, 8, 'Remove from the oven. Top each piece with a cube of butter.'),
(61, 8, 'Arrange in a serving plate. Sprinkle minced parsley all over the scallops.'),
(62, 8, 'Serve. Share and enjoy!'),
(63, 9, 'Prepare the cheese sauce by melting butter in a sauce pan.'),
(64, 9, 'Stir-in flour. Cook in medium heat while gently stirring for 1 minute.'),
(65, 9, 'Gradually pour water. Continue to stir until the texture becomes smooth.'),
(66, 9, 'Add tomato with chilies, cheese, salt, and cayenne pepper. Stir until all ingredients are well blended. Set aside.'),
(67, 9, 'Preheat oven to 375F'),
(68, 9, 'Arrange the blue corn tortilla chips over a baking dish or tray. Alternately arrange crab meat and corn. Pour the cheese sauce over and then top with cheddar cheese.'),
(69, 9, 'Bake for 9 minutes.'),
(70, 9, 'Remove from the oven and top with green onion.'),
(71, 9, 'Serve. Share and enjoy!'),
(72, 10, 'Clean the intestines well with running water.'),
(73, 10, 'Boil water in a large pot.'),
(74, 10, 'Once the water starts to boil, add the intestines. Boil for 15 minutes. Discard the water. Pour a clean batch of water on the pot. Boil with the intestines for 15 to 20 minutes. Discard one more time.'),
(75, 10, 'Pour the third batch of water in a pot. Let boil. Add 3 tablespoons rock salt, bay leaves, and peppercorn. Continue to boil in low to medium heat for 1 hour. Remove the intestine and let cool.'),
(76, 10, 'Cut the intestines crosswise into small pieces. Rub the remaining salt all over these and let it stay for 5 minutes.'),
(77, 10, 'Heat the oil in a large pot. Once the oil gets hot, deep-fry the intestines until crispy.'),
(78, 10, 'Remove the crispy intestines from the pot and arrange in a serving plate.'),
(79, 10, 'Serve with spicy vinegar. Share and enjoy!'),
(80, 11, 'Combine the yeast, sugar, and warm milk and stir until the yeast and sugar are fully dissolved.'),
(81, 11, 'In the mixing bowl, combine the dry ingredients starting with the flour then the sugar, salt, and baking powder. Mix well by stirring.'),
(82, 11, 'Add the egg, butter, cooking oil, and yeast-sugar-milk mixture in the mixing bowl with the dry ingredients then mix again until a dough is formed. Use your clean hands to effectively mix the ingredients.'),
(83, 11, 'In a flat surface, knead the dough until the texture becomes fine. For faster and easier kneading, you may use a Stand Mixer with dough hook.'),
(84, 11, 'Mold the dough until shape becomes round then put back in the mixing bowl. Cover the mixing bowl with damp cloth and let the dough rise for at least 1 hour.'),
(85, 11, 'Put the dough back to the flat surface and divide into 4 equal parts using a dough slicer.'),
(86, 11, 'Roll each part until it forms a cylindrical shape.'),
(87, 11, 'Slice the cylindrical dough diagonally (These slices will be the individual pieces of the pandesal).'),
(88, 11, 'Roll the sliced dough over the breadcrumbs and place in a baking tray with wax paper (makes sure to provide gaps between dough as this will rise later on).'),
(89, 11, 'Leave the sliced dough with breadcrumbs in the tray for another 10 to 15 minutes to rise.'),
(90, 11, 'Pre-heat the oven at 375 degrees Fahrenheit for 10 minutes.'),
(91, 11, 'Put the tray with dough in the oven and bake for 15 minutes.'),
(92, 11, 'Turn off the oven and remove the freshly baked pandesal.'),
(93, 11, 'Serve hot. Share and enjoy!'),
(94, 12, 'Using all the eggs, separate the yolk from the egg white (only egg yolks will be used).'),
(95, 12, 'Place the egg yolks in a big bowl then beat them using a fork or an egg beater.'),
(96, 12, 'Add the condensed milk and mix thoroughly.'),
(97, 12, 'Pour-in the fresh milk and Vanilla. Mix well.'),
(98, 12, 'Put the mold (llanera) on top of the stove and heat using low fire.'),
(99, 12, 'Put-in the granulated sugar on the mold and mix thoroughly until the solid sugar turns into liquid (caramel) having a light brown color. Note: Sometimes it is hard to find a Llanera (Traditional flan mold) depending on your location. I find it more convenient to use individual Round Pans in making leche flan.'),
(100, 12, 'Spread the caramel (liquid sugar) evenly on the flat side of the mold.'),
(101, 12, 'Wait for 5 minutes then pour the egg yolk and milk mixture on the mold.'),
(102, 12, 'Cover the top of the mold using an Aluminum foil.'),
(103, 12, 'Steam the mold with egg and milk mixture for 30 to 35 minutes.'),
(104, 12, 'After steaming, let the temperature cool down then refrigerate.'),
(105, 12, 'Serve for dessert. Share and Enjoy!'),
(106, 13, 'Prepare the filling. Combine mango, peaches, sugar, cinnamon powder, and cornstarch in a bowl. Mix well. Set aside.'),
(107, 13, 'Flatten a slice of bread using a rolling pin. Slice the flattened bread in half.'),
(108, 13, 'Make a symmetrical fold and seal the edges by rubbing water and then pressing against each other. Leave one side open.'),
(109, 13, 'Fill the pocket with enough peach-mango filling. Seal. You now have your peach mango nuggets.'),
(110, 13, 'Heat oil in a pot.'),
(111, 13, 'Beat eggs in a bow. Dip nuggets in egg and then roll over bred crumbs until completely coated. You can press the crumbs lightly towards the nuggets to ensure that it adheres well.'),
(112, 13, 'Fry one side in medium heat until it turns golden brown. Do the same to the opposite side.'),
(113, 13, 'Remove from the pot and place on a plate lined with paper towel.'),
(114, 13, 'Serve for dessert. Share and enjoy!'),
(115, 14, 'Combine water and powdered gelatin then stir using a spoon.'),
(116, 14, 'Add Buko Pandan flavoring then stir until everything is evenly distributed.'),
(117, 14, 'Heat a saucepan and pour-in the mixture. Bring to a boil while continuously stirring.'),
(118, 14, 'Turn off the heat and transfer the mixture to a mold. Allow the temperature to cool. The texture of the mixture should be firm once cooled. You may also place this inside the refrigerator for faster results (allow the temperature to go down before putting-in the refrigerator).'),
(119, 14, 'Combine condensed milk, table cream, sago pearls, and young coconut then mix well. Allow the texture to thicken by chilling in the refrigerator or freezer for a few hours.'),
(120, 14, 'Slice the firm gelatin into 1 inch cubes then combine with the condensed milk-cream-young coconut-sago mixture.'),
(121, 14, 'Transfer to individual serving platters or cups then top with a scoop of vanilla ice-cream.'),
(122, 14, 'Serve for dessert. Share and enjoy!'),
(123, 15, 'Combine the sticky rice and water in a rice cooker and cook until the rice is ready (we intentionally combined lesser amount of water than the usual so that the rice will not be fully cooked).'),
(124, 15, 'While the rice is cooking, combine the coconut milk with brown sugar and salt in a separate pot and cook in low heat until the texture becomes thick. Stir constantly.'),
(125, 15, 'Once the rice is cooked and the coconut milk-sugar mixture is thick enough, add the cooked rice in the coconut milk and sugar mixture then mix well. Continue cooking until all the liquid evaporates (but do not overcook).'),
(126, 15, 'Scoop the cooked biko and place it in a serving plate then flatten the surface.'),
(127, 15, 'Share and Enjoy!'),
(128, 16, 'Preheat oven to 350F.'),
(129, 16, 'Prepare the dry ingredients by sifting flour and cocoa powder in a mixing bowl. Add baking powder and sugar. Mix well using a wire whisk. Set aside.'),
(130, 16, 'On a separate bowl, crack eggs. Beat the eggs.'),
(131, 16, 'Add Lady\'s Choice Mayonnaise. Mix well until all the ingredients in the bowl are well blended. Add vanilla extract and gradually add-in sugar. Continue to mix until texture becomes smooth.'),
(132, 16, 'Melt the chocolate chips using a double boiler (watch video below for details).Stir-in the melted chocolate with the mayonnaise mixture. Mix well.'),
(133, 16, 'Gradually add the dry ingredients with the mayonnaise mixture. Fold until smooth. Add chopped walnuts.'),
(134, 16, 'Pour the brownie mixture into an 8x8 baking pan. Bake for 20 to 25 minutes.'),
(135, 16, 'Remove from the oven. Let the brownies cool down.'),
(136, 16, 'Serve. Share and enjoy!'),
(137, 17, 'Combine garlic, onion, ginger, lemongrass, and chili. Crush the ingredients using a mortar and pestle tool or a food processor. Set aside.'),
(138, 17, 'Heat oil in a cooking pot. Saute the crushed ingredients for 1 minute.'),
(139, 17, 'Add chicken. Saute until outer part turns light brown.'),
(140, 17, 'Pour-in water. Let boil.'),
(141, 17, 'Add Knorr Chicken Cube. Cover the pot. Continue cooking using low to medium heat for 30 minutes.'),
(142, 17, 'Add sotanghon. Cook for 3 minutes.'),
(143, 17, 'Add green onions and season with patis and ground white pepper.'),
(144, 17, 'Transfer to a serving bowl. Serve.'),
(145, 17, 'Share and enjoy!'),
(146, 18, 'Boil water in a cooking pot. Add chicken. Cover and continue boiling for 18 minutes. Remove chicken from the pot and let it cool down. Save the chicken stock for later.'),
(147, 18, 'Separate the bone from the meat and then shred. Set shredded chicken aside.'),
(148, 18, 'Heat oil in a cooking pot. Add crushed garlic right away. Continue cooking the garlic until it turns light brown.'),
(149, 18, 'Add onion. Sauté until it softens.'),
(150, 18, 'Add sayote. Cook for 1 minute.'),
(151, 18, 'Put shredded chicken into the pot and pour-in chicken stock. Cover the pot and let the liquid boil.'),
(152, 18, 'Add Knorr Chicken Cube. Stir and add the sotanghon noodles. Cook until noodles are soft.'),
(153, 18, 'Add malunggay leaves. Cook for 1 minute.'),
(154, 18, 'Season with patis and ground black pepper. Transfer to a serving bowl. Share and enjoy!'),
(155, 19, 'Boil water in a cooking pot. Add chicken. Cover and boil for 20 minutes. Remove chicken and let it cool down. Shred the meat and set aside. Save the chicken stock.'),
(156, 19, 'Heat oil in a cooking pot. Sauté onion and garlic until onion softens.'),
(157, 19, 'Add chicken. Sauté for 1 minute.'),
(158, 19, 'Pour-in chicken stock. Let boil.'),
(159, 19, 'Add Knorr Chicken Cube. Stir. Cover and cook for 5 minutes.'),
(160, 19, 'Add asparagus. Cook for 5 minutes.'),
(161, 19, 'Add spinach and season with salt and ground black pepper.'),
(162, 19, 'Transfer to a serving bowl. Serve.'),
(173, 21, 'Boil 6 cups water in a cooking pot.'),
(174, 21, 'Put Ox bat and balls. Continue to boil for 15 to 20 minutes. Remove from the cooking pot and wash with running water. Discard the water.'),
(175, 21, 'Pour 6 cups water in a cooking pot. Let boil. Add sibot herb mix and lemongrass. Cook for 5 minutes.'),
(176, 21, 'Add bat and balls into the pot. Continue to cook for 3 to 4 hours or until tender. Note: you can use a pressure cooker to tenderize it quickly. Add water as needed.'),
(177, 21, 'Remove the meat from the pot. Let it cool down and then slice into smaller pieces. Filter the liquid using a kitchen sieve to separate the solid ingredients. Set aside.'),
(178, 21, 'Heat oil in a cooking pot. Saute garlic, onion, and ginger until garlic browns and onion softens.'),
(179, 21, 'Add the sliced bat and balls and chopped Thai chili. Saute for 2 minutes.'),
(180, 21, 'Pour the filtered liquid and add beef broth. Let boil. Cook for 20 minutes.'),
(181, 21, 'Season with fish sauce and ground black pepper and add sugar. Cook for 5 minutes more.'),
(182, 21, 'Make the soup thicker by pouring a mixture composed of cornstarch and water. Stir.'),
(183, 21, 'Transfer to a serving bowl. Serve.'),
(184, 21, 'Share and enjoy!'),
(185, 22, 'Prepare the chicken. Start to boil the chicken by pouring 1 quart water on a cooking pot over a stove top. Apply heat and let boil. Add 1 teaspoon salt and put the chicken breasts into the pot. Cover and boil in medium heat for 22 minutes. Remove chicken from the pot. Let it cool down. Manually shred into pieces and set aside.'),
(186, 22, 'Prepare the macaroni by following package instructions. Boil 3 quarts water in a pot. Add 1 teaspoon salt. Pour the macaroni into the pot. Stir. Cover the pot and continue to boil the macaroni in medium heat for 9 minutes or until al dente. Make sure to stir every 3 minutes to prevent the macaroni from sticking to each other. Drain the water. Set macaroni aside.'),
(187, 22, 'Arrange Macaroni in a large mixing bowl. Add shredded chicken. Toss.'),
(188, 22, 'Put-in pineapple, pimiento, green bell pepper, raisins, carrot, sweet relish, and cheese. Toss until ingredients are blended.'),
(189, 22, 'Add lady\'s Choice Mayonnaise and garlic powder. Gently toss until well blended.'),
(190, 22, 'Season with salt and ground black pepper.'),
(191, 22, 'Serve! Share with the family and enjoy.'),
(192, 23, 'Boil water in a pot. Add potato. Boil for 5 minutes.'),
(193, 23, 'Add carrot. Boil for 10 minutes. Remove potato and carrot from the pot. Place in a clean bowl and let it cool down.'),
(194, 23, 'Add frozen green peas into the pot with boiling water. Boil for 1 minute. Remove and set aside.'),
(195, 23, 'Add chicken into the pot. Boil for 15 minutes. Set aside.'),
(196, 23, 'Slice potato, carrot, and chicken into cubes. Set aside.'),
(197, 23, 'Make the salad dressing by combining Lady’s Choice Mayonnaise, pickle relish, onion powder, ground black pepper, sugar, and salt in a bowl. Mix well.'),
(198, 23, 'Combine potato, carrot, peas, and chicken with the salad dressing and then add shredded cheddar cheese. Toss until well blended.'),
(199, 23, 'Refrigerate for at least one hour. Serve. Share and enjoy!'),
(200, 24, 'Combine 5 cups water and chicken in a cooking pot. Let the liquid boil. Continue to cook the chicken for 15 to 18 minutes using medium heat. Remove the chicken from the pot. Let it cool down and then slice into cubes. Set aside.'),
(201, 24, 'Cook macaroni according to package instructions using the remaining water. Drain water and place macaroni on a large bowl.'),
(202, 24, 'Make the salad dressing by combining Lady’s Choice Mayonnaise, onion, sugar, salt, and ground black pepper. Stir until well blended. Set aside.'),
(203, 24, 'Combine cooked macaroni, cheese, raisins, pineapple, and chicken. Toss.'),
(204, 24, 'Add eggs and salad dressing. Continue to toss until all ingredients are well distributed.'),
(205, 24, 'Sprinkle the chopped parsley. Toss. Refrigerate the salad for at least 1 hour.'),
(206, 24, 'Transfer to a serving bowl. Serve. Share and enjoy!'),
(207, 25, 'Cook macaroni according to package instructions. Discard water and arranged cooked macaroni in a mixing bowl. Set aside.'),
(208, 25, 'Prepare the salad dressing by combining all the dressing ingredients in a bowl, including Lady’s Choice Mayonnaise. Mix until the texture smoothens. Set aside.'),
(209, 25, 'Combine macaroni, fruit cocktail, kaong, and cheese. Gently toss.'),
(210, 25, 'Pour the dressing mixture into the bowl. Toss until all ingredients are well bleneded.'),
(211, 25, 'Cover the bowl. Refrigerate for at least 1 hour.'),
(212, 25, 'Transfer to a serving plate. Serve for dessert. Share and enjoy!'),
(221, 20, 'Prepare the chicken by boiling water in a cooking pot. Add bay leaf. Put the chicken breast in the pot. Cover and boil in medium heat for 20 minutes. Remove chicken from the pot and put in a clean plate. Let it cool down. Save the chicken stock. Shred the chicken and set aside. '),
(222, 20, 'Heat oil in a large pot. Saute garlic until light brown. Add onion and celery. Saute until onion softens. '),
(223, 20, 'Put the shredded chicken in the pot and then saute for 2 minutes.'),
(224, 20, 'Pour chicken stock and let boil.'),
(225, 20, 'Add Knorr Chicken Cube. Stir.'),
(226, 20, 'Add annatto water and sotanghon noodles. Cover and cook for 10 minutes.'),
(227, 20, 'Put carrots and cabbage into the pot. Cook for 5 minutes.'),
(228, 20, 'Season with fish sauce and ground black pepper.'),
(229, 20, 'Put some roasted garlic and chopped scallions. Stir.'),
(230, 20, 'Transfer to a serving bowl. Serve. Share and enjoy!'),
(231, 26, 'Boil 5 cups water in a cooking pot. Add 1/2 teaspoon salt. Put elbow macaroni into the pot, stir and boil according to package instructions. Add the frozen green peas 1 1/2 minutes before the suggested time of boiling as indicated in the package. Drain water and set cooked macaroni and peas aside.'),
(232, 26, 'Prepare the salad dressing. Place Lady\'s Choice Mayonnaise in a large bowl. Add remaining dressing ingredients. Mix well.'),
(233, 26, 'In a large bowl. combine macaroni, peas, and all remaining salad ingredients. Toss until ingredients are distributed.'),
(234, 26, 'Add salad dressing. Continue to toss until well blended.'),
(235, 26, 'Refrigerate for 1 hour.'),
(236, 26, 'Serve. Share and enjoy!'),
(253, 29, '321'),
(254, 29, '3321'),
(255, 29, '21'),
(256, 29, ''),
(257, 29, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_image_name` varchar(100) NOT NULL,
  `user_verified` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_username`, `user_password`, `user_image_name`, `user_verified`) VALUES
(1, 'Aj Candelaria', 'ajajcandelaria@gmail.com', 'ajaj', '123', 'The_Finale220.jpg', 'Yes'),
(2, 'Monkey D. Luffy', 'pirateking@gmail.com', 'luffy', '123', 'luffy2.jpg', 'Yes'),
(3, 'God Usopp', 'godusopp@gmail.com', 'usopp', '123', 'usopp.png', 'Yes'),
(4, 'Roronoa Zoro', 'roronoazoro@gmail.com', 'zoro', '123', 'zoro.jpg', 'Yes'),
(5, 'Vinsmoke Sanji', 'vinsmokesanji@gmail.com', 'sanji', '123', 'sanji.jpg', 'Yes'),
(7, 'Test Name', 'ajajcandelaria@gmail.com', 'test', '123', 'AJ_2x2_final.jpg', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD PRIMARY KEY (`recipe_ingredient_id`);

--
-- Indexes for table `recipe_post`
--
ALTER TABLE `recipe_post`
  ADD PRIMARY KEY (`recipe_post_id`);

--
-- Indexes for table `recipe_step`
--
ALTER TABLE `recipe_step`
  ADD PRIMARY KEY (`recipe_step_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  MODIFY `recipe_ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `recipe_post`
--
ALTER TABLE `recipe_post`
  MODIFY `recipe_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `recipe_step`
--
ALTER TABLE `recipe_step`
  MODIFY `recipe_step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
