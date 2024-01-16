<?php


/*Traccia 1:
- Crea una classe Company che abbia i seguenti attributi pubblici:
    - name: nome dell’azienda;
    - location: stato in cui e' ubicata la sede dell’azienda;
    - tot_employees: numero di dipedenti assunti in quella sede (di default, 0);
- Crea 5 istanze di 5 aziende diverse
- Crea un metodo che permetta di stampare a terminale la seguente frase: “L’ufficio Aulab con sede in Italia ha ben 50 dipendenti“; se la sede non ha dipendendi, allora stampa: “L’ufficio Aulab con sede in Italia non ha dipendenti“;
- Definisci un attributo statico
    - avg_wage, con valore 1500.
- Implementa un nuovo metodo che, per ogni oggetto Company istanziati, calcoli la spesa annuale e la stampi per ogni oggetto.
- Implementa un nuovo metodo che e' in grado di calcolare di volta in volta tutti i totali, in relazione alle varie aziende create.
- Implementa un metodo statico che permetta di stampare a terminale il totale assoluto di tutte le aziende messe insieme. */


class Company{

    public $name;
    public $location;
    public $tot_employees = 0;
    static public $avg_wage = 1500;
    static public $total_expense = 0;


    public function __construct($_name,$_location,$_tot_employees) {
        $this->name = $_name;
        $this->location = $_location;
        $this->tot_employees = $_tot_employees;
    }


    public function print(){
        if ($this->tot_employees > 0) {
            echo "L'ufficio {$this->name} con sede in {$this->location} ha ben {$this->tot_employees} dipendenti\n";
        } else {
            echo "L'ufficio {$this->name} con sede in {$this->location} non ha dipendenti\n";
        }
    }

    public function calculateAnnualExpense() {
        $annual_expense = $this->tot_employees * self::$avg_wage * 12;
        echo "La spesa annuale per l'azienda $this->name è di $annual_expense\n";

        self::$total_expense += $annual_expense;
    }

    public function calculateTotalMonthsExpense($months) {
        $months_expense = $this->tot_employees * self::$avg_wage * $months;
        echo "La spesa totale dell'azienda $this->name per $months mesi è di $months_expense \n";
    }

    public static function calculateTotalExpense() {
        echo "La spesa annuale totale di tutte le aziende è di" ." ". self::$total_expense . "\n";
    }
}


$company1 = new Company("Aulab", "Italia", 50);
$company2 = new Company("Apple", "USA", 200);
$company3 = new Company("Samsung", "Germania", 150);
$company4 = new Company("Coca-Cola", "Francia", 60);
$company5 = new Company("Medianet", "Spagna", 0);

// var_dump($company1);
// var_dump($company2);
// var_dump($company3);
// var_dump($company4);
// var_dump($company5);

$company1->print();
$company2->print();
$company3->print();
$company4->print();
$company5->print();

$company1->calculateAnnualExpense();
$company2->calculateAnnualExpense();
$company3->calculateAnnualExpense();
$company4->calculateAnnualExpense();
$company5->calculateAnnualExpense();

$months = (int)readline("Inserisci il numero di mesi: ");

$company1->calculateTotalMonthsExpense($months);
$company2->calculateTotalMonthsExpense($months);
$company3->calculateTotalMonthsExpense($months);
$company4->calculateTotalMonthsExpense($months);
$company5->calculateTotalMonthsExpense($months);

Company::calculateTotalExpense();


