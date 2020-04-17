//heroes has id and name
//abilities has an id and ability
//ability_hero has it's own id and hero_id and ability_id

//example of three
<!-- SELECT O.OrderNumber, CONVERT(date,O.OrderDate) AS Date, 
       P.ProductName, I.Quantity, I.UnitPrice 
  FROM [Order] O 
  JOIN OrderItem I ON O.Id = I.OrderId 
  JOIN Product P ON P.Id = I.ProductId
ORDER BY O.OrderNumber -->

SELECT heroes.id, heroes.name, abilities.ability, ability_hero.hero_id, ability_hero.ability_id
FROM heroes
JOIN id on heroes.id=ability_hero.hero_id
JOIN id on abilities.id=ability_hero.ability_id

 

