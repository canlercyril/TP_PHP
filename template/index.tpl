{if isset($recherche)}
<hr>
Votre recherche est : <b> {$recherche} </b><br /><br />
{/if}



{if isset($totalarticle)}
{if $totalarticle == 0 }
Aucun résultat ne correspond à votre recherche<br /><hr>
{elseif $totalarticle == 1}
<b>un</b> seul résultat correspond à votre recherche</b><hr>
{else}
<b>{$totalarticle}</b> résultats correspondent à votre recherche<br /><hr>
{/if}
{/if}


{foreach from=$data_tab item=data}

<h2>{$data['titre']}</h2>
<p style = "text-align: justify;">
<p>Le : {$data['date_fr']} </p>
<p>{$data['texte']}</p>
<p><img src="img/{$data['id']}.jpg" alt="image"/>

{if $identification == true}
<div align="right"><a class="btn btn-success " href="article.php?id={$data['id']}">Editer</a>
&nbsp; &nbsp;
<a class="btn btn-danger " href="supprimer.php?id={$data['id']}">Supprimer</a><br /></div>
{/if}
<hr> 


{*{$data['texte']|truncate:500}<br/><a href="TP_PHP/index.php?id=($data['id']}" title="More ma suite !"> Lire la suite</a></p>*}

{/foreach}

{if isset($recherche)}
Page n° 
{for $foo=1 to $nbTotalDePage}
<a href="index.php?recherche={$recherche}&page={$foo}">{$foo}</a>
{/for}

{elseif $page == 0}
Page n° 
{for $foo=1 to $nbTotalDePage}
<a href="index.php?page={$foo}">{$foo}</a>
{/for}
{/if}