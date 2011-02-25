<?php $nutrFact = get_the_nutrition_facts(get_the_ID()); ?>
<?php if($nutrFact): ?>
  <div class="nutrition">
  
    <h3>Nutrition Facts</h3>
    <dl class="servings">
      <dt>Servings</dt>
      <dd><?php echo $nutrFact['servings']; ?></dd>
    </dl>
    
    <h4>Amount per serving</h4>
    <dl class="calories">
      <dt>Calories</dt>
      <dd><?php echo $nutrFact['calories']; ?></dd>
      
      <dt class="cal-fat">Calories from Fat</dt>
      <dd class="cal-fat"><?php echo $nutrFact['cal-fat']; ?></dd>
    </dl>

    <dl class="all">
      <dt class="fat">Fat</dt>
      <dd class="fat"><?php echo $nutrFact['fat']; ?>g</dd>
      
      <dt class="sat-fat">Saturated Fat</dt>
      <dd class="sat-fat"><?php echo $nutrFact['sat-fat']; ?>g</dd>
      
      <dt class="cholesterol">Cholesterol</dt>
      <dd class="cholesterol"><?php echo $nutrFact['cholesterol']; ?>mg</dd>
      
      <dt class="sodium">Sodium</dt>
      <dd class="sodium"><?php echo $nutrFact['sodium']; ?>mg</dd>
      
      <dt class="carbohydrate">Carbohydrate</dt>
      <dd class="carbohydrate"><?php echo $nutrFact['carbohydrate']; ?>g</dd>
      
      <dt class="fiber">Fiber</dt>
      <dd class="fiber"><?php echo $nutrFact['fiber']; ?>g</dd>
      
      <dt class="sugars">Sugars</dt>
      <dd class="sugars"><?php echo $nutrFact['sugars']; ?>g</dd>
      
      <dt class="protein">Protein</dt>
      <dd class="protein"><?php echo $nutrFact['protein']; ?>g</dd>
    </dl>
    
    <p class="source">
      Source of nutritional facts: <a href="<?php echo $nutrFact['source']; ?>">livestrong.com</a>
    </p>
    
  </div>
<?php endif; ?>