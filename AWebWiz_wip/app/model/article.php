<?php

/**
 * retourne l'article à afficher sur la home page
 * en première position
 * temporairement c'est l'article d'id 1
 * @param $art_id id de l'article à getter dans la db
 * @return assoc array avec les données de l'article
 */
function get_article_a($art_id=1)
{
    switch (DATABASE_TYPE) {
        case "SQL":
            return get_article_a_sql($art_id);
        case "JSON":
            return get_article_a_json($art_id);
    }
}

function get_article_a_json($art_id)
{
    $fn = DATABASE_NAME;
    $art_db_s = file_get_contents($fn);
    $art_db_a = json_decode($art_db_s, true);
    foreach( $art_db_a as $art_a)
    {
        if( $art_a["id"] == $art_id ) break;
    }
    // $art_a possède les données de l'article id 1
    return $art_a ;
}

function get_article_a_sql($art_id)
{
    $q = <<< SQL
        SELECT
            ident_art AS id,
            title_art AS title,
            '' AS hook,
            content_art AS content,
            `fk_category_art` AS category,
            date_art AS date_published, 
            image_art AS image_name
        FROM t_article
        WHERE 
            ident_art = :ident_art ;
SQL;
    $pdo = get_pdo();
    $stmt = $pdo->prepare($q);
    $param = ['ident_art' => $art_id];
	$stmt->execute($param);
    $result = $stmt->fetch();
    return $result;
}

function get_bottom_article_a()
{
    $art_aa = [];
    foreach( [ 2, 3, 4 ] as $art_id)
    {
        $art_aa[] = get_article_a($art_id);
    }
    return $art_aa;
}

/**
 * retourne tous (?) les articles de la db
 * @return mixed
 */
function get_all_article_a($kw='', $limit=DEFAULT_SEARCH_LIMIT)
{
    switch(DATABASE_TYPE) {
        case "SQL":
            return get_all_article_a_sql($kw, $limit);
        case  "JSON":
            return get_all_article_a_json();
    }
}

function get_all_article_a_json()
{
    $fn = DATABASE_NAME;
    $art_db_s = file_get_contents($fn);
    $art_db_a = json_decode($art_db_s, true);
    return $art_db_a;
}

function get_all_article_a_sql($kw='', $limit=DEFAULT_SEARCH_LIMIT): array
{
    $q = <<< SQL
        SELECT
            ident_art AS id,
            title_art AS title,
            hook_art AS hook,
            content_art AS content,
            `fk_category_art` AS category    
        FROM t_article
        WHERE title_art LIKE :kw_string
        ORDER BY ident_art DESC
        LIMIT :limit
SQL;
    $pdo = get_pdo();
    // $stmt = $pdo->query($q);
    $stmt = $pdo->prepare($q);
    $kw_string = "%$kw%";
    // settype( $limit, 'integer');
    /*$param = [
        'kw_string' => $kw_string,
        // 'limit' => $limit
    ];*/
    $stmt->bindParam( ':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam( ':kw_string', $kw_string);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}
