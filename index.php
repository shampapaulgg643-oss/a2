<?php
// Artichoke Plum — homepage
$calendar = json_decode('{"1": {"name": "January", "veg": ["Kale", "Leeks", "Cabbage", "Parsnips", "Turnips", "Brussels sprouts"], "fruit": ["Oranges", "Grapefruit", "Lemons", "Stored apples", "Stored pears"], "tip": "Deep winter is citrus season. A squeeze of lemon or a few orange segments wakes up a pot of braised greens or roasted roots."}, "2": {"name": "February", "veg": ["Kale", "Leeks", "Cauliflower", "Celery root", "Beets", "Cabbage"], "fruit": ["Blood oranges", "Mandarins", "Lemons", "Kiwi"], "tip": "Celery root is ugly but wonderful. Peel it thickly, then roast it in wedges or simmer it with potatoes for a silky mash."}, "3": {"name": "March", "veg": ["Artichokes", "Spring onions", "Spinach", "Radishes", "Leeks", "Cabbage"], "fruit": ["Lemons", "Grapefruit", "Blood oranges"], "tip": "The first artichokes arrive. Choose heavy heads with tight leaves that squeak slightly when you squeeze them."}, "4": {"name": "April", "veg": ["Asparagus", "Artichokes", "Peas", "Radishes", "Spring onions", "Spinach"], "fruit": ["Rhubarb", "Early strawberries", "Lemons"], "tip": "Snap asparagus where it breaks naturally, then save the woody ends for a quick vegetable stock."}, "5": {"name": "May", "veg": ["Asparagus", "Artichokes", "Peas", "Fava beans", "Lettuce", "New potatoes"], "fruit": ["Strawberries", "Rhubarb", "Early cherries"], "tip": "New potatoes need very little: boil them in salted water, then toss with butter, chives and a little lemon zest."}, "6": {"name": "June", "veg": ["Zucchini", "Green beans", "Peas", "Lettuce", "Cucumbers", "Fennel"], "fruit": ["Cherries", "Strawberries", "Apricots", "Blueberries"], "tip": "Pick smaller zucchini. They are firmer, less watery and sweeter than the giant ones that seem to appear overnight."}, "7": {"name": "July", "veg": ["Tomatoes", "Sweet corn", "Zucchini", "Eggplant", "Peppers", "Cucumbers"], "fruit": ["Peaches", "Plums", "Blueberries", "Raspberries", "Watermelon"], "tip": "Keep tomatoes on the counter, not in the fridge. Cold dulls their flavour and turns the texture mealy."}, "8": {"name": "August", "veg": ["Tomatoes", "Sweet corn", "Eggplant", "Peppers", "Okra", "Green beans"], "fruit": ["Plums", "Peaches", "Nectarines", "Figs", "Blackberries", "Melon"], "tip": "Plums are at their best. Ripe ones give slightly near the stem and smell sweet; firm ones ripen in a paper bag within two days."}, "9": {"name": "September", "veg": ["Tomatoes", "Peppers", "Winter squash", "Eggplant", "Cauliflower", "Autumn artichokes"], "fruit": ["Apples", "Pears", "Plums", "Figs", "Grapes"], "tip": "Late summer meets early autumn. Roast the last tomatoes with the first squash for a sauce that tastes like both seasons."}, "10": {"name": "October", "veg": ["Pumpkins", "Winter squash", "Sweet potatoes", "Brussels sprouts", "Beets", "Kale"], "fruit": ["Apples", "Pears", "Cranberries", "Quince", "Persimmons"], "tip": "Buy squash that feels heavy for its size with a dry, firm stem. Whole squash keep for weeks in a cool, dark corner."}, "11": {"name": "November", "veg": ["Winter squash", "Sweet potatoes", "Parsnips", "Carrots", "Brussels sprouts", "Celery root"], "fruit": ["Apples", "Pears", "Cranberries", "Pomegranates", "Persimmons"], "tip": "Halve Brussels sprouts and roast them cut-side down in a hot oven until deeply browned. That caramelised edge is everything."}, "12": {"name": "December", "veg": ["Kale", "Cabbage", "Leeks", "Parsnips", "Turnips", "Rutabaga"], "fruit": ["Clementines", "Pomegranates", "Pears", "Oranges"], "tip": "Pomegranate seeds keep for days in the fridge and add colour and crunch to winter salads and grain bowls."}}', true);
$m = (int) date('n');
$now = $calendar[(string) $m];
$monthName = $now['name'];

$subMsg = '';
$subOk = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub_email'])) {
    $email = trim((string) filter_input(INPUT_POST, 'sub_email', FILTER_SANITIZE_EMAIL));
    if (!empty($_POST['company'])) {
        $subOk = true;
        $subMsg = 'Thank you!';
    } elseif ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        @file_put_contents(__DIR__ . '/subscribers.txt', date('c') . "\t" . $email . PHP_EOL, FILE_APPEND | LOCK_EX);
        $subOk = true;
        $subMsg = 'You are on the list. Your first Sunday List arrives this weekend.';
    } else {
        $subMsg = 'Please enter a valid email address.';
    }
}
function ap_e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Artichoke Plum | Seasonal Recipes &amp; Home Cooking Guide</title>
<meta name="description" content="Cook with the seasons. Artichoke Plum shares simple, tested recipes, a month-by-month produce calendar and practical kitchen tips for everyday home cooks.">
<meta name="robots" content="index, follow, max-image-preview:large">
<link rel="canonical" href="https://www.artichokeplum.com/">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Artichoke Plum">
<meta property="og:title" content="Artichoke Plum | Seasonal Recipes &amp; Home Cooking Guide">
<meta property="og:description" content="Cook with the seasons. Artichoke Plum shares simple, tested recipes, a month-by-month produce calendar and practical kitchen tips for everyday home cooks.">
<meta property="og:url" content="https://www.artichokeplum.com/">
<meta property="og:image" content="https://images.unsplash.com/photo-1518735869015-566a18eae4be?auto=format&fit=crop&w=1200&q=75">
<meta name="twitter:card" content="summary_large_image">
<meta name="theme-color" content="#5A2A48">
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Ccircle cx='32' cy='34' r='26' fill='%235A2A48'/%3E%3Cpath d='M32 8c6 0 10 3 12 7-5 1-9 0-12-3z' fill='%237D8C4A'/%3E%3C/svg%3E">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://images.unsplash.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0LY0HY7L01"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-0LY0HY7L01');
</script>
<script type="application/ld+json">[{"@context": "https://schema.org", "@type": "WebSite", "name": "Artichoke Plum", "url": "https://www.artichokeplum.com/"}, {"@context": "https://schema.org", "@type": "Organization", "name": "Artichoke Plum", "url": "https://www.artichokeplum.com/", "email": "hello@artichokeplum.com", "telephone": "+1-888-777-5845", "address": {"@type": "PostalAddress", "streetAddress": "181 Mercer Street", "addressLocality": "New York", "addressRegion": "NY", "postalCode": "10012", "addressCountry": "US"}}, {"@context": "https://schema.org", "@type": "Recipe", "name": "Tray-Roasted Autumn Vegetables with Lemon, Garlic and Herbs", "image": "https://images.unsplash.com/photo-1606791422814-b32c705e3e2f?auto=format&fit=crop&w=1200&q=75", "author": {"@type": "Organization", "name": "Artichoke Plum"}, "recipeYield": "4 servings", "prepTime": "PT15M", "cookTime": "PT40M", "totalTime": "PT55M", "recipeCategory": "Side dish", "recipeIngredient": ["1 small butternut squash (about 2 lb / 900 g)", "2 medium carrots", "1 red onion", "1 head garlic", "3 tbsp olive oil", "1 tsp fine sea salt", "1/2 tsp black pepper", "4 sprigs fresh thyme", "1 lemon", "1 small handful flat-leaf parsley", "2 tbsp toasted pumpkin seeds"], "recipeInstructions": [{"@type": "HowToStep", "text": "Heat the oven to 425°F (220°C)."}, {"@type": "HowToStep", "text": "Cut the vegetables into similar-sized pieces and toss with oil, salt, pepper and thyme on a large tray."}, {"@type": "HowToStep", "text": "Roast for 35 to 40 minutes, turning once, until browned at the edges."}, {"@type": "HowToStep", "text": "Squeeze the roasted garlic over, add lemon zest and juice, then finish with parsley and pumpkin seeds."}]}, {"@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "What does “cooking seasonally” actually mean?", "acceptedAnswer": {"@type": "Answer", "text": "It simply means building meals around the fruit and vegetables that are being harvested near you right now. In practice, that is whatever looks abundant, fresh and reasonably priced at the market or in the produce aisle this week."}}, {"@type": "Question", "name": "Do I need special equipment for your recipes?", "acceptedAnswer": {"@type": "Answer", "text": "No. Almost everything on this site can be made with a good knife, a chopping board, a large pan, a pot, a roasting tray and an oven. Where a recipe benefits from something extra, like a blender, we say so up front."}}, {"@type": "Question", "name": "Are your recipes vegetarian?", "acceptedAnswer": {"@type": "Answer", "text": "Most of them are built around vegetables, fruit, grains and pulses, and many happen to be vegetarian. We always list every ingredient clearly so you can check for anything you avoid."}}, {"@type": "Question", "name": "How do you test recipes?", "acceptedAnswer": {"@type": "Answer", "text": "Each recipe is cooked in a regular home kitchen at least twice, measured in both cups and grams, and then written up with the mistakes we made along the way so you can skip them. Our editorial policy explains the full process."}}, {"@type": "Question", "name": "Why is your produce calendar different from my local market?", "acceptedAnswer": {"@type": "Answer", "text": "Harvests change with climate and region. Our calendar reflects a typical temperate North American growing year, so treat it as a guide and let your own market have the final word."}}, {"@type": "Question", "name": "Can I ask you a cooking question?", "acceptedAnswer": {"@type": "Answer", "text": "Yes, please do. Use our contact page and we will reply as soon as we can. Good questions often turn into new tips on the site."}}]}]</script>
</head>
<body>
<a class="skip" href="#main">Skip to content</a>
<header class="site-header">
  <div class="bar">
    <a class="brand" href="index.php" aria-label="Artichoke Plum home">
      <svg class="mark" viewBox="0 0 40 40" aria-hidden="true"><circle cx="20" cy="22" r="15" fill="#5A2A48"/><path d="M20 5c4 0 7 2 8 5-4 1-6 0-8-2z" fill="#7D8C4A"/><circle cx="15" cy="18" r="3" fill="#8B4A72"/></svg>
      <span>Artichoke<em>Plum</em></span>
    </a>
    <nav aria-label="Main navigation">
      <ul class="pill-nav" id="nav-list"><li><a href="index.php" aria-current="page">Home</a></li><li><a href="recipes.html">Recipes</a></li><li><a href="seasonal-guide.html">Seasonal Guide</a></li><li><a href="about.html">About</a></li><li><a href="contact.html">Contact</a></li></ul>
    </nav>
    <a class="head-cta" href="index.php#sunday-list">The Sunday List</a>
    <button class="burger" aria-label="Open menu" aria-expanded="false" aria-controls="nav-list"><span></span><span></span></button>
  </div>
</header>

<main id="main">

<!-- 1. Hero -->
<section class="hero">
  <div class="wrap">
    <span class="kicker">A seasonal home kitchen</span>
    <h1>Cook what&#8217;s <em>ripe</em>, not what&#8217;s <span class="strike">on the list</span>.</h1>
    <div class="hero-row">
      <div class="hero-intro">
        <p>Artichoke Plum is a friendly guide to cooking with the seasons. We share simple recipes, a month-by-month produce calendar and practical kitchen know-how, so you can walk into any market and know exactly what to do with what you find.</p>
        <div class="btns">
          <a class="btn" href="recipes.html">Browse recipes <span class="arr">&rarr;</span></a>
          <a class="btn btn--ghost" href="#calendar">What&#8217;s in season?</a>
        </div>
      </div>
      <div class="plate">
        <svg class="ring" viewBox="0 0 300 300" aria-hidden="true"><defs><path id="circ" d="M150,150 m-138,0 a138,138 0 1,1 276,0 a138,138 0 1,1 -276,0"/></defs><text><textPath href="#circ">eat with the seasons &#8226; cook with what&#8217;s fresh &#8226; waste a little less &#8226;</textPath></text></svg>
        <div class="dish"><img src="https://images.unsplash.com/photo-1518735869015-566a18eae4be?auto=format&fit=crop&w=700&q=75" alt="fresh green and purple artichokes piled together" width="700" height="700" fetchpriority="high"></div>
      </div>
      <div class="hero-side">
        <div class="tall"><img src="https://images.unsplash.com/photo-1564750497011-ead0ce4b9448?auto=format&fit=crop&w=500&q=75" alt="fresh purple plums with water droplets and green leaves" width="500" height="733"></div>
        <span class="sticker">In season: <?php echo ap_e($monthName); ?></span>
      </div>
    </div>
  </div>
</section>

<!-- 2. In season now -->
<section class="now" aria-labelledby="now-title">
  <div class="wrap">
    <div class="now-head">
      <div><span class="kicker">Worth buying this week</span><h2 id="now-title">Four autumn <em>favourites</em></h2></div>
      <p>These are the ingredients that fill our basket as the weather cools. They are affordable, easy to find and forgiving in the kitchen.</p>
    </div>
    <ol class="now-list">
      <li><div class="circle"><img src="https://images.unsplash.com/photo-1533924049770-7c32435557c5?auto=format&fit=crop&w=500&q=75" alt="sliced orange pumpkin on a wooden surface" width="500" height="500" loading="lazy"></div><h3>Squash</h3><p>Roast it, mash it or blend it into soup. The sweet flesh loves sage, chilli and brown butter.</p></li>
      <li><div class="circle"><img src="https://images.unsplash.com/photo-1696426506268-00a41b06b956?auto=format&fit=crop&w=500&q=75" alt="plate of ripe pears with a leaf on a table" width="500" height="500" loading="lazy"></div><h3>Pears</h3><p>Ripen them on the counter and check the neck: when it gives gently, they are ready.</p></li>
      <li><div class="circle"><img src="https://images.unsplash.com/photo-1635341814161-d696d538542c?auto=format&fit=crop&w=500&q=75" alt="bunch of fresh figs sitting on a table" width="500" height="500" loading="lazy"></div><h3>Figs</h3><p>Fragile and fleeting. Eat them within a day or two, torn open with yogurt and honey.</p></li>
      <li><div class="circle"><img src="https://images.unsplash.com/photo-1663961355715-cf362778dc0e?auto=format&fit=crop&w=500&q=75" alt="pile of fresh purple beets" width="500" height="500" loading="lazy"></div><h3>Beets</h3><p>Wrap in foil and roast until tender; the skins slip off easily once they cool.</p></li>
    </ol>
  </div>
</section>

<!-- 3. Calendar -->
<section class="calendar" id="calendar" aria-labelledby="cal-title">
  <div class="wrap">
    <div class="cal-box">
      <div>
        <span class="kicker">Produce calendar</span>
        <h2 id="cal-title">What&#8217;s good <em>this month?</em></h2>
        <p class="muted">Pick a month to see which vegetables and fruit are usually at their best in a temperate North American climate. It opens on the current month automatically.</p>
        <div class="months" role="group" aria-label="Choose a month"><button type="button" class="month" data-m="1" aria-pressed="<?php echo $m === 1 ? 'true' : 'false'; ?>">Jan</button><button type="button" class="month" data-m="2" aria-pressed="<?php echo $m === 2 ? 'true' : 'false'; ?>">Feb</button><button type="button" class="month" data-m="3" aria-pressed="<?php echo $m === 3 ? 'true' : 'false'; ?>">Mar</button><button type="button" class="month" data-m="4" aria-pressed="<?php echo $m === 4 ? 'true' : 'false'; ?>">Apr</button><button type="button" class="month" data-m="5" aria-pressed="<?php echo $m === 5 ? 'true' : 'false'; ?>">May</button><button type="button" class="month" data-m="6" aria-pressed="<?php echo $m === 6 ? 'true' : 'false'; ?>">Jun</button><button type="button" class="month" data-m="7" aria-pressed="<?php echo $m === 7 ? 'true' : 'false'; ?>">Jul</button><button type="button" class="month" data-m="8" aria-pressed="<?php echo $m === 8 ? 'true' : 'false'; ?>">Aug</button><button type="button" class="month" data-m="9" aria-pressed="<?php echo $m === 9 ? 'true' : 'false'; ?>">Sep</button><button type="button" class="month" data-m="10" aria-pressed="<?php echo $m === 10 ? 'true' : 'false'; ?>">Oct</button><button type="button" class="month" data-m="11" aria-pressed="<?php echo $m === 11 ? 'true' : 'false'; ?>">Nov</button><button type="button" class="month" data-m="12" aria-pressed="<?php echo $m === 12 ? 'true' : 'false'; ?>">Dec</button></div>
      </div>
      <div class="produce-panel" id="produce-panel" aria-live="polite">
        <h3 data-f="name"><?php echo ap_e($now['name']); ?></h3>
        <h4>Vegetables</h4>
        <ul class="chips" data-f="veg"><?php foreach ($now['veg'] as $v) echo '<li>' . ap_e($v) . '</li>'; ?></ul>
        <h4>Fruit</h4>
        <ul class="chips fruit" data-f="fruit"><?php foreach ($now['fruit'] as $f) echo '<li>' . ap_e($f) . '</li>'; ?></ul>
        <p class="tip"><strong>Kitchen tip:</strong> <span data-f="tip"><?php echo ap_e($now['tip']); ?></span></p>
        <p style="margin:14px 0 0"><a href="seasonal-guide.html">Read the full seasonal guide &rarr;</a></p>
      </div>
    </div>
  </div>
</section>
<script>window.AP_CALENDAR = <?php echo json_encode($calendar); ?>;</script>

<!-- 4. Methods -->
<section class="methods" aria-labelledby="meth-title">
  <div class="wrap">
    <div class="methods-head">
      <span class="kicker">Kitchen basics</span>
      <h2 id="meth-title">Six habits that make <em>everything</em> taste better</h2>
      <p>None of these are fancy. They are the small things experienced home cooks do without thinking, and they will improve almost any recipe you try.</p>
    </div>
    <div class="cards6">
      <article class="icard"><span class="no">01</span><h3>Salt as you go</h3><p>A pinch at each stage seasons food from the inside. Salting only at the end tastes flat and salty at once.</p></article>
      <article class="icard"><span class="no">02</span><h3>Don&#8217;t crowd the pan</h3><p>Vegetables packed too tightly steam instead of browning. Use two trays if you need to; the colour is worth it.</p></article>
      <article class="icard"><span class="no">03</span><h3>Preheat properly</h3><p>Give your oven a full 15 minutes and your pan a minute or two. Heat is what creates crisp edges.</p></article>
      <article class="icard"><span class="no">04</span><h3>Finish with acid</h3><p>A squeeze of lemon or a splash of vinegar at the end brightens a dish that tastes heavy or dull.</p></article>
      <article class="icard"><span class="no">05</span><h3>Cut evenly</h3><p>Pieces of a similar size cook at the same pace, so nothing is burnt while the rest is still hard.</p></article>
      <article class="icard"><span class="no">06</span><h3>Taste, then adjust</h3><p>Recipes are a starting point. Your ingredients and stove are unique, so trust your own tongue.</p></article>
    </div>
  </div>
</section>

<!-- 5. Recipe feature -->
<section class="recipe-sec" aria-labelledby="rec-title">
  <div class="wrap">
    <span class="kicker">Recipe of the week</span>
    <h2 id="rec-title">One tray, <em>very little fuss</em></h2>
    <article class="recipe">
      <div class="img"><img src="https://images.unsplash.com/photo-1606791422814-b32c705e3e2f?auto=format&fit=crop&w=900&q=75" alt="golden roasted vegetables in a black pan" width="900" height="900" loading="lazy"></div>
      <div class="body">
        <h3>Tray-roasted autumn vegetables with lemon, garlic &amp; herbs</h3>
        <ul class="meta"><li>Serves 4</li><li>Prep 15 min</li><li>Cook 40 min</li><li>Easy</li></ul>
        <p>This is the recipe we make most often from October to March. It works as a side, or as a main with a spoon of yogurt and some crusty bread.</p>
        <div class="recipe-cols">
          <div>
            <h4>Ingredients</h4>
            <ul class="ingredients">
              <li><label><input type="checkbox"><span>1 small butternut squash (about 2 lb / 900 g), peeled and cut into 1-inch cubes</span></label></li>
              <li><label><input type="checkbox"><span>2 medium carrots, cut into chunks</span></label></li>
              <li><label><input type="checkbox"><span>1 red onion, cut into wedges</span></label></li>
              <li><label><input type="checkbox"><span>1 head garlic, cloves separated, skins on</span></label></li>
              <li><label><input type="checkbox"><span>3 tbsp olive oil</span></label></li>
              <li><label><input type="checkbox"><span>1 tsp fine sea salt and &frac12; tsp black pepper</span></label></li>
              <li><label><input type="checkbox"><span>4 sprigs fresh thyme</span></label></li>
              <li><label><input type="checkbox"><span>1 lemon, a handful of parsley and 2 tbsp toasted pumpkin seeds, to finish</span></label></li>
            </ul>
          </div>
          <div>
            <h4>Method</h4>
            <ol class="steps">
              <li>Heat the oven to 425&deg;F (220&deg;C) and put a large roasting tray inside to warm up.</li>
              <li>Toss the squash, carrots, onion and garlic with the oil, salt, pepper and thyme in a big bowl.</li>
              <li>Tip everything onto the hot tray in a single layer. Roast for 35&ndash;40 minutes, turning once halfway, until golden at the edges and tender inside.</li>
              <li>Squeeze the soft garlic out of its skins and stir it through. Grate over the lemon zest, add a good squeeze of juice, then scatter with chopped parsley and pumpkin seeds.</li>
            </ol>
          </div>
        </div>
      </div>
    </article>
    <article class="recipe recipe--mini">
      <div class="body">
        <h3>Honey-roasted plums with thick yogurt</h3>
        <ul class="meta"><li>Serves 4</li><li>25 min</li><li>Dessert or breakfast</li></ul>
        <p>Halve and stone 8 ripe plums and lay them cut-side up in a baking dish. Drizzle with 2 tablespoons of honey and 1 tablespoon of melted butter, add a pinch of cinnamon and a few thyme sprigs, then roast at 400&deg;F (200&deg;C) for 15&ndash;20 minutes, until soft and syrupy. Spoon the warm plums and their juices over cold, thick yogurt. Any leftovers are excellent on porridge the next morning.</p>
        <a class="btn btn--choke" href="recipes.html">More seasonal recipes <span class="arr">&rarr;</span></a>
      </div>
      <div class="img"><img src="https://images.unsplash.com/photo-1569701239632-ed5c8d863753?auto=format&fit=crop&w=800&q=75" alt="halved fresh plums ready for roasting" width="800" height="600" loading="lazy"></div>
    </article>
  </div>
</section>

<!-- 6. Pantry -->
<section class="pantry" aria-labelledby="pantry-title">
  <div class="wrap pantry-grid">
    <div class="intro">
      <span class="kicker">The seasonal pantry</span>
      <h2 id="pantry-title">Four staples that do the <em>heavy lifting</em></h2>
      <p class="muted">Fresh produce changes every month, but a few good cupboard basics tie every meal together. Keep these stocked and a simple dinner is never far away.</p>
    </div>
    <div class="shelf">
      <article><div class="sq"><img src="https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?auto=format&fit=crop&w=300&q=75" alt="glass cruet bottle of olive oil" width="220" height="220" loading="lazy"></div><div><h3>Good olive oil</h3><p>One everyday bottle for cooking and a nicer one for drizzling over finished dishes.</p></div></article>
      <article><div class="sq"><img src="https://images.unsplash.com/photo-1608322368735-b6b6ec262af7?auto=format&fit=crop&w=300&q=75" alt="whole and sliced yellow lemons on a white cloth" width="220" height="220" loading="lazy"></div><div><h3>Lemons</h3><p>Zest for fragrance, juice for brightness. We rarely cook a meal without one.</p></div></article>
      <article><div class="sq"><img src="https://images.unsplash.com/photo-1763368403529-0b8d9108cf9c?auto=format&fit=crop&w=300&q=75" alt="bowls of assorted dried beans and lentils" width="220" height="220" loading="lazy"></div><div><h3>Beans &amp; lentils</h3><p>Cheap, filling and endlessly flexible. Lentils need no soaking and cook in 25 minutes.</p></div></article>
      <article><div class="sq"><img src="https://images.unsplash.com/photo-1757802261964-a8e03ed98981?auto=format&fit=crop&w=300&q=75" alt="jars of spices neatly arranged on shelves" width="220" height="220" loading="lazy"></div><div><h3>A few spices</h3><p>Cumin, smoked paprika, chilli flakes and cinnamon cover a surprising amount of ground.</p></div></article>
    </div>
  </div>
</section>

<!-- 7. Why seasonal -->
<section class="why" aria-labelledby="why-title">
  <div class="wrap why-grid">
    <div>
      <span class="kicker" style="color:#FFE2BF">Why it matters</span>
      <h2 id="why-title">Seasonal food is simply <em>easier</em> to cook well</h2>
      <div class="reasons">
        <div><h3>It tastes better</h3><p>Produce picked closer to ripeness has had more time to develop flavour, so it needs less help from you.</p></div>
        <div><h3>It is often cheaper</h3><p>When something is abundant, prices usually drop. Summer tomatoes and autumn squash are good examples.</p></div>
        <div><h3>It keeps cooking interesting</h3><p>Changing ingredients through the year gently pushes you out of a recipe rut without any extra effort.</p></div>
      </div>
    </div>
    <div class="why-img"><img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=900&q=75" alt="woman cooking at the stove in a bright home kitchen" width="900" height="740" loading="lazy"></div>
  </div>
</section>

<!-- 8. Market polaroids -->
<section class="market" aria-labelledby="market-title">
  <div class="wrap">
    <div class="market-head">
      <div><span class="kicker">At the market</span><h2 id="market-title">Where our week <em>begins</em></h2></div>
      <p>We plan meals backwards: first we see what looks best on the stalls, then we decide what to cook. It is a relaxed habit that wastes far less food.</p>
    </div>
    <div class="polaroids">
      <figure class="polaroid"><div class="ph"><img src="https://images.unsplash.com/photo-1591586116988-62fe65164f8d?auto=format&fit=crop&w=500&q=75" alt="cauliflower, broccoli, radishes and onions on a market stall" width="500" height="625" loading="lazy"></div><figcaption>Brassicas &amp; radishes</figcaption></figure>
      <figure class="polaroid"><div class="ph"><img src="https://images.unsplash.com/photo-1485637701894-09ad422f6de6?auto=format&fit=crop&w=500&q=75" alt="ripe red tomatoes in blue baskets at a market" width="500" height="625" loading="lazy"></div><figcaption>Late tomatoes</figcaption></figure>
      <figure class="polaroid"><div class="ph"><img src="https://images.unsplash.com/photo-1471193945509-9ad0617afabf?auto=format&fit=crop&w=500&q=75" alt="bunches of fresh carrots and leeks" width="500" height="625" loading="lazy"></div><figcaption>Carrots &amp; leeks</figcaption></figure>
      <figure class="polaroid"><div class="ph"><img src="https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?auto=format&fit=crop&w=500&q=75" alt="large pile of fresh oranges in bright sunlight" width="500" height="625" loading="lazy"></div><figcaption>First citrus</figcaption></figure>
    </div>
  </div>
</section>

<!-- 9. Guides -->
<section class="guides" aria-labelledby="guides-title">
  <div class="wrap">
    <span class="kicker">Find your way around</span>
    <h2 id="guides-title" style="margin-bottom:34px">How Artichoke Plum can <em>help</em></h2>
    <div class="guide-row">
      <a class="guide" href="recipes.html"><span class="ic">&#10047;</span><h3>Tested recipes</h3><p>Everyday dishes built around seasonal produce, written in cups and grams, with honest timings and tips.</p><span class="go">See the recipes &rarr;</span></a>
      <a class="guide" href="seasonal-guide.html"><span class="ic">&#9788;</span><h3>Seasonal guide</h3><p>How to choose, store and prepare the best produce of each season, from spring asparagus to winter citrus.</p><span class="go">Read the guide &rarr;</span></a>
      <a class="guide" href="contact.html"><span class="ic">&#9993;</span><h3>Ask a question</h3><p>Stuck on a technique or wondering what to do with a mystery vegetable? Send it our way and we will help.</p><span class="go">Get in touch &rarr;</span></a>
    </div>
  </div>
</section>

<!-- 10. Conversions -->
<section class="conv" id="conversions" aria-labelledby="conv-title">
  <div class="wrap">
    <span class="kicker">Handy reference</span>
    <h2 id="conv-title" style="margin-bottom:34px">Kitchen <em>conversions</em></h2>
    <div class="conv-box">
      <div class="conv-card">
        <h3>Cups to grams</h3>
        <p class="muted">Approximate weights for one level US cup. Weighing is always more accurate, especially for baking.</p>
        <div class="tbl-wrap"><table class="tbl">
          <thead><tr><th>Ingredient</th><th>1 cup</th></tr></thead>
          <tbody>
            <tr><td>All-purpose flour</td><td>125 g</td></tr>
            <tr><td>Granulated sugar</td><td>200 g</td></tr>
            <tr><td>Brown sugar (packed)</td><td>220 g</td></tr>
            <tr><td>Butter</td><td>227 g</td></tr>
            <tr><td>Rolled oats</td><td>90 g</td></tr>
            <tr><td>Uncooked long-grain rice</td><td>190 g</td></tr>
            <tr><td>Honey</td><td>340 g</td></tr>
            <tr><td>Milk or water</td><td>240 ml</td></tr>
          </tbody>
        </table></div>
      </div>
      <div class="conv-card">
        <h3>Oven temperatures</h3>
        <p class="muted">Rounded to the settings most ovens use. For fan or convection ovens, reduce by about 25&deg;F (15&ndash;20&deg;C).</p>
        <div class="tbl-wrap"><table class="tbl">
          <thead><tr><th>&deg;F</th><th>&deg;C</th><th>Gas</th><th>Good for</th></tr></thead>
          <tbody>
            <tr><td>300</td><td>150</td><td>2</td><td>Slow braises</td></tr>
            <tr><td>325</td><td>165</td><td>3</td><td>Rich cakes</td></tr>
            <tr><td>350</td><td>180</td><td>4</td><td>Most baking</td></tr>
            <tr><td>375</td><td>190</td><td>5</td><td>Crumbles, gratins</td></tr>
            <tr><td>400</td><td>200</td><td>6</td><td>Roasting fruit</td></tr>
            <tr><td>425</td><td>220</td><td>7</td><td>Roasting vegetables</td></tr>
            <tr><td>450</td><td>230</td><td>8</td><td>Bread, pizza</td></tr>
          </tbody>
        </table></div>
      </div>
    </div>
  </div>
</section>

<!-- 11. FAQ -->
<section class="qa" aria-labelledby="qa-title">
  <div class="wrap">
    <span class="kicker">Questions &amp; answers</span>
    <h2 id="qa-title">Things readers <em>often ask</em></h2>
    <div class="qa-grid">
      <div class="qa-item"><h3>What does &ldquo;cooking seasonally&rdquo; actually mean?</h3><p>It simply means building meals around the fruit and vegetables that are being harvested near you right now. In practice, that is whatever looks abundant, fresh and reasonably priced at the market or in the produce aisle this week.</p></div>
      <div class="qa-item"><h3>Do I need special equipment for your recipes?</h3><p>No. Almost everything on this site can be made with a good knife, a chopping board, a large pan, a pot, a roasting tray and an oven. Where a recipe benefits from something extra, like a blender, we say so up front.</p></div>
      <div class="qa-item"><h3>Are your recipes vegetarian?</h3><p>Most of them are built around vegetables, fruit, grains and pulses, and many happen to be vegetarian. We always list every ingredient clearly so you can check for anything you avoid.</p></div>
      <div class="qa-item"><h3>How do you test recipes?</h3><p>Each recipe is cooked in a regular home kitchen at least twice, measured in both cups and grams, and then written up with the mistakes we made along the way so you can skip them. Our editorial policy explains the full process.</p></div>
      <div class="qa-item"><h3>Why is your produce calendar different from my local market?</h3><p>Harvests change with climate and region. Our calendar reflects a typical temperate North American growing year, so treat it as a guide and let your own market have the final word.</p></div>
      <div class="qa-item"><h3>Can I ask you a cooking question?</h3><p>Yes, please do. Use our contact page and we will reply as soon as we can. Good questions often turn into new tips on the site.</p></div>
    </div>
  </div>
</section>

<!-- 12. Sunday list -->
<section class="sunday" id="sunday-list" aria-labelledby="sun-title">
  <img src="https://images.unsplash.com/photo-1463183547458-6a2c760d0912?auto=format&fit=crop&w=1800&q=75" alt="long wooden table set with shared plates of food" width="1800" height="1200" loading="lazy">
  <div class="wrap">
    <div class="sunday-box">
      <span class="kicker" style="color:#FFD7A8">The Sunday List</span>
      <h2 id="sun-title">A short weekly email for <em>unhurried cooks</em></h2>
      <p>Every Sunday: what&#8217;s in season, one simple recipe and one kitchen tip. That&#8217;s it. It is free, and you can unsubscribe with one click.</p>
      <?php if ($subMsg): ?><p class="<?php echo $subOk ? 'notice-ok' : 'notice-err'; ?>" role="status"><?php echo ap_e($subMsg); ?></p><?php endif; ?>
      <form class="sub-form" method="post" action="index.php#sunday-list">
        <label for="sub-email" class="skip">Email address</label>
        <input type="email" id="sub-email" name="sub_email" placeholder="you@example.com" required autocomplete="email">
        <input type="text" name="company" tabindex="-1" autocomplete="off" style="display:none" aria-hidden="true">
        <button class="btn" type="submit">Join the list</button>
      </form>
      <p class="small">We respect your inbox. Read our <a href="privacy-policy.html">Privacy Policy</a>.</p>
    </div>
  </div>
</section>

</main>
<footer class="site-footer">
  <div class="wrap">
    <div class="foot-top">
      <a class="brand brand--light" href="index.php"><svg class="mark" viewBox="0 0 40 40" aria-hidden="true"><circle cx="20" cy="22" r="15" fill="#F4E6EE"/><path d="M20 5c4 0 7 2 8 5-4 1-6 0-8-2z" fill="#B9C58A"/></svg><span>Artichoke<em>Plum</em></span></a>
      <p>A seasonal home-cooking guide. Simple recipes, honest kitchen advice and a gentle nudge to cook with whatever looks best at the market this week.</p>
    </div>
    <div class="foot-links">
      <div><h4>Cook</h4><a href="recipes.html">Recipes</a><a href="seasonal-guide.html">Seasonal Guide</a><a href="index.php#calendar">Produce Calendar</a><a href="index.php#conversions">Kitchen Conversions</a></div>
      <div><h4>About</h4><a href="about.html">Our Kitchen</a><a href="editorial-policy.html">Editorial Policy</a><a href="contact.html">Contact Us</a></div>
      <div><h4>Legal</h4><a href="privacy-policy.html">Privacy Policy</a><a href="terms-and-conditions.html">Terms &amp; Conditions</a><a href="cookie-policy.html">Cookie Policy</a><a href="disclaimer.html">Disclaimer</a></div>
      <div><h4>Say hello</h4><p>181 Mercer Street, New York, NY 10012, United States</p><a href="tel:+18887775845">+1-888-777-5845</a><a href="mailto:hello@artichokeplum.com">hello@artichokeplum.com</a></div>
    </div>
    <div class="foot-base">
      <span>&copy; <?php echo date("Y"); ?> Artichoke Plum. All rights reserved.</span>
      <span>Photography from Unsplash, used under the Unsplash License.</span>
    </div>
  </div>
</footer>
<div class="cookie" id="cookie" role="dialog" aria-label="Cookie notice">
  <p>We use essential cookies, plus analytics cookies if you allow them, to see which recipes are useful. <a href="cookie-policy.html">Learn more</a>.</p>
  <div><button class="ok" data-cookie="accepted">Accept</button><button data-cookie="declined">Essential only</button></div>
</div>
<script src="assets/js/main.js" defer></script>
</body>
</html>
