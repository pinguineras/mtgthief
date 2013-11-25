<?php 

/////////////////////////////////////////////
/////////////////////////////////////////////
/////// Magic The Gathering Thief ///////////
/////////////////////////////////////////////
/////////////////////////////////////////////

// Just Edit the document index.php in the function STOLE the edition you want Stole.
// Here some SLUG'S you can enter: "Magic+2013", "Magic+2012", "Theros", "Invasion" ....


// Fork me in Github : https://github.com/pinguineras

// http://www.nopasse.com.br - Brazilian Magic Deck Builder with CSS and JS.


Class mtgcardThief {

	public function getCardsbyEdition($Edition = "Commander+2013+Edition"){

		// Url para pegar todos os links da edição
		$urlEdition = 'http://gatherer.wizards.com/Pages/Search/Default.aspx?output=spoiler&action=advanced&set=["'.$Edition.'"]';
		// $urlEdition = 'http://mtglist.local/teste/';

		$editionContent = file_get_contents($urlEdition);

		// Setando todas as URL's para fazer o get das informações Básicas
		preg_match_all('/\?multiverseid=[0-9]{1,300}"/', $editionContent, $idCards);
		// preg_match_all('/\?multiverseid=(.*?)">/', $editionContent, $idCards);


		$cards = array();

		foreach ($idCards as $id) {
			$texto = preg_replace("/\?multiverseid=/", "", $id);
			$texto = preg_replace("/\"/", "", $texto);

			foreach ($texto as $card) {
				$cards[] = $card;
			}
		}

		$cartas = array_unique($cards);

		return $cartas;

	}



	// Setando Raridade
	public function setRarity($rarity){

		if($rarity == "Common"){
			$saida = "Comum";
		}
		else if($rarity == "Uncommon"){
			$saida = "Incomum";
		}
		else if($rarity == "Rare"){
			$saida = "Rara";
		}
		else if($rarity == "Mythic Rare"){
			$saida = "Mítica";
		}

		return $saida;
	}

	// Setando o tipo
	public function setType($type){

		preg_match_all('/Creature/', $type, $Creature);


		if($Creature[0] != NULL){
			return 'Creature';
		}

		preg_match_all('/Enchantment/', $type, $Enchantment);

		if($Enchantment[0] != NULL){
			return 'Enchantment';
		}

		preg_match_all('/Artifact/', $type, $Artifact);

		if($Artifact[0] != NULL){
			return 'Artifact';
		}

		preg_match_all('/Instant/', $type, $Instant);

		if($Instant[0] != NULL){
			return 'Instant';
		}

		preg_match_all('/Sorcery/', $type, $Sorcery);

		if($Sorcery[0] != NULL){
			return 'Sorcery';
		}

		preg_match_all('/Land/', $type, $Land);

		if($Land[0] != NULL){
			return 'Land';
		}

		preg_match_all('/Planeswalker/', $type, $Planeswalker);

		if($Planeswalker[0] != NULL){
			return 'Planeswalker';
		}


	}

	public function replacingCost($texto){
		$text = $texto;

		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=G&amp;type=symbol" alt="Green" align="absbottom" />', "{G}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=U&amp;type=symbol" alt="Blue" align="absbottom" />', "{U}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=R&amp;type=symbol" alt="Red" align="absbottom" />', "{R}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=W&amp;type=symbol" alt="White" align="absbottom" />', "{W}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=B&amp;type=symbol" alt="Black" align="absbottom" />', "{B}", $text);

		// Custos
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=16&amp;type=symbol" alt="16" align="absbottom" />', "{16}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=15&amp;type=symbol" alt="15" align="absbottom" />', "{15}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=14&amp;type=symbol" alt="14" align="absbottom" />', "{14}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=13&amp;type=symbol" alt="13" align="absbottom" />', "{13}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=12&amp;type=symbol" alt="12" align="absbottom" />', "{12}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=11&amp;type=symbol" alt="11" align="absbottom" />', "{11}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=10&amp;type=symbol" alt="10" align="absbottom" />', "{10}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=9&amp;type=symbol" alt="9" align="absbottom" />', "{9}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=8&amp;type=symbol" alt="8" align="absbottom" />', "{8}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=7&amp;type=symbol" alt="7" align="absbottom" />', "{7}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=6&amp;type=symbol" alt="6" align="absbottom" />', "{6}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=5&amp;type=symbol" alt="5" align="absbottom" />', "{5}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=4&amp;type=symbol" alt="4" align="absbottom" />', "{4}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=3&amp;type=symbol" alt="3" align="absbottom" />', "{3}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=2&amp;type=symbol" alt="2" align="absbottom" />', "{2}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=1&amp;type=symbol" alt="1" align="absbottom" />', "{1}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=0&amp;type=symbol" alt="0" align="absbottom" />', "{0}", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=small&amp;name=x&amp;type=symbol" alt="x" align="absbottom" />', "{X}", $text);



		return $text;
	}

	public function getCost($texto){
		$text = $texto;

		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=G&amp;type=symbol" alt="Green" align="absbottom" />', "G", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=U&amp;type=symbol" alt="Blue" align="absbottom" />', "U", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=R&amp;type=symbol" alt="Red" align="absbottom" />', "R", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=W&amp;type=symbol" alt="White" align="absbottom" />', "W", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=B&amp;type=symbol" alt="Black" align="absbottom" />', "B", $text);

		// Custos
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=16&amp;type=symbol" alt="16" align="absbottom" />', "16", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=15&amp;type=symbol" alt="15" align="absbottom" />', "15", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=14&amp;type=symbol" alt="14" align="absbottom" />', "14", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=13&amp;type=symbol" alt="13" align="absbottom" />', "13", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=12&amp;type=symbol" alt="12" align="absbottom" />', "12", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=11&amp;type=symbol" alt="11" align="absbottom" />', "11", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=10&amp;type=symbol" alt="10" align="absbottom" />', "10", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=9&amp;type=symbol" alt="9" align="absbottom" />', "9", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=8&amp;type=symbol" alt="8" align="absbottom" />', "8", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=7&amp;type=symbol" alt="7" align="absbottom" />', "7", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=6&amp;type=symbol" alt="6" align="absbottom" />', "6", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=5&amp;type=symbol" alt="5" align="absbottom" />', "5", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=4&amp;type=symbol" alt="4" align="absbottom" />', "4", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=3&amp;type=symbol" alt="3" align="absbottom" />', "3", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=2&amp;type=symbol" alt="2" align="absbottom" />', "2", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=1&amp;type=symbol" alt="1" align="absbottom" />', "1", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=0&amp;type=symbol" alt="0" align="absbottom" />', "0", $text);
		$text = str_replace('<img src="/Handlers/Image.ashx?size=medium&amp;name=x&amp;type=symbol" alt="x" align="absbottom" />', "X", $text);



		return $text;
	}

	public function getCard($id){

		// Url para a importação (direto do site da Wizards)
		//$urlCard = 'http://mtglist.local/teste2/index.html'; // URL de teste
		$urlCard = 'http://gatherer.wizards.com/Pages/Card/Details.aspx?multiverseid='.$id;


		// Array que vai ter todo o conteúdo da carta
		$card = array();


		////////////////////////////////////////////////
		//////// INICIANDO A CAPTURA DOS DADOS  ////////
		////////////////////////////////////////////////

		// Pegando dados da página
		$PageContent = file_get_contents($urlCard);


		// Pega o nome do Card
		preg_match_all('/(?s)Card Name:<\/div>(.*?)<div class="value">(.*?)<\/div>/si', $PageContent, $Name);
		



		if($Name[2][0]){ //Array que contêm o nome
			$card['name'] = $Name[2][0];
		}

		// Pega o texto do Card (Com tags HTML direto da Wizards)
		preg_match_all('/(?s)<div class="cardtextbox">(.*?)<\/div>/si', $PageContent, $textCard);

		if($textCard){ // Se tiver texto de card
			foreach ($textCard[0] as $text) {
				$outputText .= "<p>".$text."</p>";
			}

			$card['text'] = $this->replacingCost($outputText);
			unset($outputText);
		} else {
			$card['text'] = NULL;
		}


		// Pega o custo do Card 
		preg_match_all('/(?s)Mana Cost:<\/div>(.*?)<div class="value">(.*?)<\/div>/si', $PageContent, $manacost);

		
		if($manacost[2][0]){ 
			$card['manacost'] = $this->getCost(trim($manacost[2][0]));
		}else {
			$card['manacost'] = NULL;
		}


		// Pegando o P/T do Card
		preg_match_all('/(?s)<b>P\/T:<\/b><\/div>(.*?)<div class="value">(.*?)<\/div>/si', $PageContent, $p_t);

		if($p_t[2][0]){ // Array que contêm o Powert and Thoughness
			$card['pt'] = trim($p_t[2][0]);
		}else {
			$card['pt'] = NULL;
		}

		// Pegando Raridade
		preg_match_all('/(?s)Rarity:<\/div>(.*?)<div class="value">(.*?)<\/div>/si', $PageContent, $rarity);

		

		if($rarity[2][0]){ // Array que contêm a raridade
			$card['rarity'] = $this->setRarity(strip_tags(trim($rarity[2][0])));
		}

		else {
			$card['rarity'] = NULL;
		}


		// Pegando o Artista
		preg_match_all('/(?s)Artist:<\/div>(.*?)<div id="ctl00_ctl00_ctl00_MainContent_SubContent_SubContent_ArtistCredit" class="value">(.*?)<\/a>/si', $PageContent, $Artist);

		if($Artist[2][0]){
			$card['artist'] = strip_tags($Artist[2][0]);
		}
		else {
			$card['artist'] = NULL;
		}


		// Número da carta na edição
		preg_match_all('/(?s)Card Number:<\/div>(.*?)<div class="value">(.*?)<\/div>/si', $PageContent, $number);

		if($number[2][0]){
			$card['setNumber'] = $number[2][0];
		}
		else {
			$card['setNumber'] = NULL;
		}

		// Tipo da carta
		preg_match_all('/(?s)Types:<\/div>(.*?)<div class="value">(.*?)<\/div>/si', $PageContent, $Type);

		if($Type[2][0]){
			$card['type'] = $this->setType($Type[2][0]);
		}
		else {
			$card['Type'] = NULL;
		}


		$Image = file_get_contents("http://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=".$id."&type=card");
		$nameImage = './img/'.$id.'.jpg';
		if(file_put_contents($nameImage, $Image)){
			$card['image'] = '/img/'.$id.'.jpg';
		}





		return $card;

	}

	public function Stole($Edition = "Commander+2013+Edition"){

		$cards = array();

		$idCards = $this->getCardsbyEdition($Edition);

		foreach ($idCards as $id) {
			$cards[] = $this->getCard($id);
		}


		return $cards;
	}


}

 ?>