//UWAGA !!! nazwy klas konczące się słowem rezerwacja są przetwarzane
// ID koncertu finałowego to 4
$(document).ready(function(){	

$(".sala").slideUp("slow"); 											//zwiń wszystkie sale
//$(".sala").css("display" , "none"); 

//$(".sala_csm").slideDown("slow"); //sala_marzenie
//$(".sala_marzenie").slideDown("slow");


$(".przycisk_koncerty").prepend("<div class=\"zam_bil\">Zamów bilety na</div>");


/*----ZAZNACZA ZAREZERWOWANE MIEJSCA WEDŁUG TABLICY WCZYTANEJ Z BAZY DANYCH */
	// if (tab_rezerwacji === undefined){
		// alert("jest tablica");
	// }else {
		// alert("nie ma tablicy");
	// }
	// for(var i=0; i<tab_rezerwacji.length;i++){
		// //alert('tab_rezerwacji['+ i+'] = '+ tab_rezerwacji[i] );
		// var query_miejsce = "div[id='"+tab_rezerwacji[i]+"'][class='miejsce']";
		// var query_miejsce_n = "div[id='"+tab_rezerwacji[i] +"'][class='miejsce_n']";	
		// var query_miejsce_luslawice = "div[id='"+tab_rezerwacji[i] +"'][class='miejsce luslawice']";
		// $(query_miejsce_luslawice).removeClass("miejsce").addClass("miejsce_zarezerwowane_ECM");		
		// $(query_miejsce).removeClass("miejsce").addClass("miejsce_zarezerwowane");		
		// $(query_miejsce_n).removeClass("miejsce_n").addClass("miejsce_n_zarezerwowane");	
	// }
	
	for(var i=0; i<tab_rezerwacji.length;i++){
		//alert('tab_rezerwacji['+ i+'] = '+ tab_rezerwacji[i] );
		var query_miejsce = "div[id='"+tab_rezerwacji[i]+"']";
		//miejsce_n -> prawdopodobnie miejsce dla niepelnosprawnych
		//var query_miejsce_n = "div[id='"+tab_rezerwacji[i] +"'][class='miejsce_n']";	
		//var query_miejsce_luslawice = "div[id='"+tab_rezerwacji[i] +"'][class='miejsce luslawice']";
		//$(query_miejsce_luslawice).removeClass("miejsce").addClass("miejsce_zarezerwowane_ECM");		
		$(query_miejsce).removeClass("miejsce").addClass("miejsce_zarezerwowane");		
		//$(query_miejsce_n).removeClass("miejsce_n").addClass("miejsce_n_zarezerwowane");	
	}
	
 
/*----POBIERA ZAZNACZENIA JAKO TABLICĘ MIEJSC I ZAPISUJE DO POLA UKRYTEGO*/
	function pobierz_miejsca(){
		var tablica_miejsc = new Array();
		var tab_rzad_num = new Array();
		$("div[class$='rezerwacja']").each(function( index ){     			//pobiera elementy zaznaczone
			tablica_miejsc[index] = $(this).attr("id"); //alert(tablica_miejsc[index]);
		});
		//$("#podsumowanie").html("");
		$("form #in_hidden").html("");
		$("form #in_hidden").append("<input type=\"hidden\" name=\"miejscowki\" value=\""+tablica_miejsc+"\">");
		//$("form #in_hidden").append("<textarea cols=\"80\" rows=\"10\">"+tablica_miejsc+"</textarea>");
		//pokaz_ukryj_luslawice();
		//pobierz_najmniejsza_ilosc_miejsc();
	}	
/*----POKAZUJE SALĘ LUSŁAWIC JEŚLI ZAKUPIONE SĄ KARENTY NA WSZYSTKIE DNI; ZAZNACZA PRZYCISKI NA CZERWONO; 	*/
	function pokaz_ukryj_luslawice(){   
		var ile_wygenerowanych_sal = $(".sala").length; //alert(ile_wygenerwanych_sal); 
		var licznik_karnetow = 0 ;
		var licznik_r_miejsc = 0 ;
		//var tabSal_iloscMiejsc = new Array();
		
		$(".sala").each(function(index1){
				//alert("sala nr: " + index1);
				var query = ".sala:eq("+index1+")";
				var query_przycisk = ".przycisk_koncerty:eq("+index1+")";  														// Przycisk koncerty o indeksie 
				licznik_r_miejsc = $(query).find(".miejsce_rezerwacja, .miejsce_n_rezerwacja").length;		//ilość zanzaczonych miejsc			
				//tabSal_iloscMiejsc[index1] = licznik_r_miejsc;																			//Tablica 
				if(licznik_r_miejsc > 0){																													//jesli na danej sali jest zaznaczony wiecej niz jeden to dodaj karnet
					licznik_karnetow = licznik_karnetow +1;					
					$(query_przycisk).addClass("zaznacz");																					//zaznacz przycisk koncertu				
				}else{
					$(query_przycisk).removeClass("zaznacz");																				//odznacz przycisk koncertu
				}					
		});
				
		if (licznik_karnetow >= ile_wygenerowanych_sal){																					//jeśli zakupiono trzy karnety								
			//alert("Zakupiono "+licznik_karnetow+" karnety. Wygenerowano "+ ile_wygenerwanych_sal+" Sal");											
			$(".sala_luslawice").slideDown(); 					//pokaż salę Lusławice		
		}else{ 													//jeśli mniej niż trzy bilety
			//alert("poniżej trzech karnetów.");//jeśli wycofano jeden z trzech karnetów								
			$(".miejsca_luslawice").find(".miejsce_rezerwacja").removeClass("miejsce_rezerwacja").addClass("miejsce");
			$(".sala_luslawice").slideUp();
		}	
	}
//----POBIERA NAJMNIEJSZĄ ILOŚĆ KLIKNIETYCH REZERWACJI W POSZCZEGÓLNYCH SALACH
	
function pobierz_najmniejsza_ilosc_miejsc(){
		var najmn_wartosc =0;
		var biezaca_wartosc =0;
		var query ="";
		//var ile_wygenerowanych_sal = $(".sala").length; //alert(ile_wygenerwanych_sal); 
		
		$(".sala").each(function(index1){
				query = ".sala:eq("+index1+")";
				if ( index1 == 0){
						najmn_wartosc = $(query).find(".miejsce_rezerwacja, .miejsce_n_rezerwacja").length;		//pobranie ilosci miejsc z pierwszej sali
				}
				biezaca_wartosc = $(query).find(".miejsce_rezerwacja, .miejsce_n_rezerwacja").length;		//ilość zanzaczonych miejsc	 w danych salach
				if ( najmn_wartosc > biezaca_wartosc){
						najmn_wartosc = biezaca_wartosc;
				}
		});		
		//alert("Najmniejsza ilosc miejs to" + najmn_wartosc);
		return najmn_wartosc;
}	

//----BLOKUJE REZERWACJĘ KOLEJNEGO MIJSCA W lUSLAWICACH JESLI NIE WYKUPIONO ODPOWIEDNIEJ ILOSCI KARNETOW
function blokuj_nadmiar_rez_luslawice( miejscowka ){
	//alert("funkcja blokowania");
	var ilosc_miejsc_kliknietych_luslawice = $(".miejsca_luslawice").find(".miejsce_rezerwacja").length;
	var min_miejsc_luslawice = pobierz_najmniejsza_ilosc_miejsc();
	if (ilosc_miejsc_kliknietych_luslawice > min_miejsc_luslawice){
		$(".sala_luslawice").find(".miejsce_rezerwacja").removeClass("miejsce_rezerwacja").addClass("miejsce");
		//$(miejscowka).removeClass("miejsce_rezerwacja").addClass("miejsce");
		alert("Przy aktualnym stanie zamówienia,  na koncert finałowy możesz zarezerwować miejsc:  " + min_miejsc_luslawice + ". Zaznacz ponownie.");
	}
	
}
	
/*----REAKCJA NA KLIKNIECIA W MIEJSCA */	
$(".miejsce").toggle(function(){
			//alert("klik . miejsce");
			$(this).removeClass("miejsce");
			$(this).addClass("miejsce_rezerwacja");
			//alert(this);
			//var title = $( this).children().attr( "value" );
			//pobierz_miejsca();
			pokaz_ukryj_luslawice();
			blokuj_nadmiar_rez_luslawice( this );
		},
		function(){
			$(this).removeClass("miejsce_rezerwacja");
			$(this).addClass("miejsce");
			//pobierz_miejsca();
			pokaz_ukryj_luslawice();
			blokuj_nadmiar_rez_luslawice( this );
		});
		
$('.miejsce_n').toggle(function(){
			$(this).removeClass("miejsce_n");
			$(this).addClass("miejsce_n_rezerwacja");
			//pobierz_miejsca();
			pokaz_ukryj_luslawice();
			blokuj_nadmiar_rez_luslawice( this );
		},
		function(){
			$(this).removeClass("miejsce_n_rezerwacja");
			$(this).addClass("miejsce_n");
			//pobierz_miejsca();
			pokaz_ukryj_luslawice();
			blokuj_nadmiar_rez_luslawice( this );
		});

/*----ZWIJANOE I ROZWIJANIE SALI DLA DANYCH KONCERTÓW*/
								//zwiń wszystkie sale
$(".przycisk_koncerty").click(function(){					//pokaż salę dla danego koncertu		
		//alert("kliknieto przycisk");
		$(".sala").slideUp("slow"); 									//zwiń wszystkie sale
		var id = $(this).attr("id"); //alert(id);					//pobierz id kliknietego odnosnika wydarzenia
		var nazwa_wydarzenia = $(this).text();
		//$(".sala[id$="+id+"] .wydarzenie").html(nazwa_wydarzenia);
		//alert (".sala[id="+id+"]");
		$(".sala[id$="+id+"]").slideDown("slow"); 		//rozwiń sale o danym id
	});

function liczba_zamowionych_karnetow(){
		var ilosc_miejsc = 0;
		var ilosc_miejsc_luslawice = 0;
		var licznik = 0;
		$(".sala").each(function(index){
				query = ".sala:eq("+index+")";
				ilosc_miejsc = $(query).find(".miejsce_rezerwacja, .miejsce_n_rezerwacja").length;
				if (ilosc_miejsc > 0){

						licznik = licznik + 1;
				}
		});
		ilosc_miejsc_luslawice = $(".sala_luslawice").find(".miejsce_rezerwacja").length;
		if (ilosc_miejsc_luslawice >=1 ){
			licznik = licznik + 1;
		}
		return licznik;	
}


//----PRZYCISK ZAMÓWIENIE
	$("#zamowienie").click(function(event){
			var x = liczba_zamowionych_karnetow();
			pobierz_miejsca();							//WPISUJE MIEJSCA DO POLA UKRYTEGO

			// if (x < 4){									//JESLI NIE ZAZNACZONO WSZYSTKICH SAL Z LUSLAWICAMI
				// alert("Musiszs zaznaczyć miejscówki z wszystkich dni");
				// event.preventDefault();
			// }

			
	});
/*----PRZYCISK RESET*/
$("#btn_reset").click(function(){							
		//$(".sala_luslawice").slideDown();
		 $(".s-1").find(".miejsce_rezerwacja").removeClass("miejsce_rezerwacja").addClass("miejsce");
		 pokaz_ukryj_luslawice();
});
});

