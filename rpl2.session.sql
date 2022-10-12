SELECT platform, count(gameId)
FROM games
GROUP BY platform
HAVING count(gameId) <= 4;;