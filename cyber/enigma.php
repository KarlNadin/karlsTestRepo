<?php namespace App\Services;
/**
 * A PHP version of the Enigma machine.
 * Wikipedia: http://en.wikipedia.org/wiki/Enigma_machine
 *
 * This might not be an accurate representation. I have never seen, nor used an enigma machine.
 * This class was created by reading the article at http://enigma.louisedade.co.uk/howitworks.html.
 *
 * Usage:
 *
 * //Instantiate
 * $enigma = new Enigma();
 *
 * // Encrypt and decrypt a string
 * // Spaces and special characters not yet supported
 * $encrypted = $enigma->enigmify('String');
 * $decrypted = $enigma->denigmify($encrypted);
 *
 * // Encrypt and decrypt a single character
 * $encryptedChar = $enigma->encryptCharacter('A');
 * $decryptedChar = $enigma->decryptCharacter($encryptedChar);
 *
 * // Make a custom machine with three rotors
 * $machine = $enigma->make($rotors = 3);
 *
 **/
class Enigma {
	/**
	 * Numbers array.
	 *
	 * @var array
	 */
	protected $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
	/**
	 * Letters array.
	 *
	 * @var array
	 */
	protected $letters = [
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
	];
	/**
	 * The machine!.
	 *
	 * @var array
	 */
	protected $machine = [
		'plugboard' => [
			'A' => 'h', 'B' => 'E', 'C' => 'g', 'D' => 'P', 'E' => 'S', 'F' => 'N', 'G' => 'n',
			'H' => 'w', 'I' => 'F', 'J' => 'm', 'K' => 'b', 'L' => 'l', 'M' => 'I', 'N' => 'V',
			'O' => 'e', 'P' => 'f', 'Q' => 'Z', 'R' => 'J', 'S' => 'A', 'T' => 'o', 'U' => 'D',
			'V' => 'u', 'W' => 'L', 'X' => 'i', 'Y' => 'Y', 'Z' => 'O', 'a' => 'B', 'b' => 'r',
			'c' => 'W', 'd' => 'a', 'e' => 'x', 'f' => 'R', 'g' => 'Q', 'h' => 'X', 'i' => 'c',
			'j' => 'y', 'k' => 'K', 'l' => 'T', 'm' => 'C', 'n' => 'j', 'o' => 'p', 'p' => 'G',
			'q' => 'd', 'r' => 'H', 's' => 'k', 't' => 'z', 'u' => 's', 'v' => 't', 'w' => 'U',
			'x' => 'M', 'y' => 'v', 'z' => 'q', '0' => '2', '1' => '5', '2' => '3', '3' => '1',
			'4' => '0', '5' => '9', '6' => '8', '7' => '7', '8' => '6', '9' => '4',
		],
		'rotors' => [
			'rotor_1' => [
				'A' => 'h', 'B' => 'E', 'C' => 'g', 'D' => 'P', 'E' => 'S', 'F' => 'N', 'G' => 'n',
				'H' => 'w', 'I' => 'F', 'J' => 'm', 'K' => 'b', 'L' => 'l', 'M' => 'I', 'N' => 'V',
				'O' => 'e', 'P' => 'f', 'Q' => 'Z', 'R' => 'J', 'S' => 'A', 'T' => 'o', 'U' => 'D',
				'V' => 'u', 'W' => 'L', 'X' => 'i', 'Y' => 'Y', 'Z' => 'O', 'a' => 'B', 'b' => 'r',
				'c' => 'W', 'd' => 'a', 'e' => 'x', 'f' => 'R', 'g' => 'Q', 'h' => 'X', 'i' => 'c',
				'j' => 'y', 'k' => 'K', 'l' => 'T', 'm' => 'C', 'n' => 'j', 'o' => 'p', 'p' => 'G',
				'q' => 'd', 'r' => 'H', 's' => 'k', 't' => 'z', 'u' => 's', 'v' => 't', 'w' => 'U',
				'x' => 'M', 'y' => 'v', 'z' => 'q', '0' => '2', '1' => '5', '2' => '3', '3' => '1',
				'4' => '0', '5' => '9', '6' => '8', '7' => '7', '8' => '6', '9' => '4',
			],
			'rotor_2' => [
				'A' => 'h', 'B' => 'E', 'C' => 'g', 'D' => 'P', 'E' => 'S', 'F' => 'N', 'G' => 'n',
				'H' => 'w', 'I' => 'F', 'J' => 'm', 'K' => 'b', 'L' => 'l', 'M' => 'I', 'N' => 'V',
				'O' => 'e', 'P' => 'f', 'Q' => 'Z', 'R' => 'J', 'S' => 'A', 'T' => 'o', 'U' => 'D',
				'V' => 'u', 'W' => 'L', 'X' => 'i', 'Y' => 'Y', 'Z' => 'O', 'a' => 'B', 'b' => 'r',
				'c' => 'W', 'd' => 'a', 'e' => 'x', 'f' => 'R', 'g' => 'Q', 'h' => 'X', 'i' => 'c',
				'j' => 'y', 'k' => 'K', 'l' => 'T', 'm' => 'C', 'n' => 'j', 'o' => 'p', 'p' => 'G',
				'q' => 'd', 'r' => 'H', 's' => 'k', 't' => 'z', 'u' => 's', 'v' => 't', 'w' => 'U',
				'x' => 'M', 'y' => 'v', 'z' => 'q', '0' => '2', '1' => '5', '2' => '3', '3' => '1',
				'4' => '0', '5' => '9', '6' => '8', '7' => '7', '8' => '6', '9' => '4',
			],
			'rotor_3' => [
				'A' => 'h', 'B' => 'E', 'C' => 'g', 'D' => 'P', 'E' => 'S', 'F' => 'N', 'G' => 'n',
				'H' => 'w', 'I' => 'F', 'J' => 'm', 'K' => 'b', 'L' => 'l', 'M' => 'I', 'N' => 'V',
				'O' => 'e', 'P' => 'f', 'Q' => 'Z', 'R' => 'J', 'S' => 'A', 'T' => 'o', 'U' => 'D',
				'V' => 'u', 'W' => 'L', 'X' => 'i', 'Y' => 'Y', 'Z' => 'O', 'a' => 'B', 'b' => 'r',
				'c' => 'W', 'd' => 'a', 'e' => 'x', 'f' => 'R', 'g' => 'Q', 'h' => 'X', 'i' => 'c',
				'j' => 'y', 'k' => 'K', 'l' => 'T', 'm' => 'C', 'n' => 'j', 'o' => 'p', 'p' => 'G',
				'q' => 'd', 'r' => 'H', 's' => 'k', 't' => 'z', 'u' => 's', 'v' => 't', 'w' => 'U',
				'x' => 'M', 'y' => 'v', 'z' => 'q', '0' => '2', '1' => '5', '2' => '3', '3' => '1',
				'4' => '0', '5' => '9', '6' => '8', '7' => '7', '8' => '6', '9' => '4',
			],
			'rotor_4' => [
				'A' => 'h', 'B' => 'E', 'C' => 'g', 'D' => 'P', 'E' => 'S', 'F' => 'N', 'G' => 'n',
				'H' => 'w', 'I' => 'F', 'J' => 'm', 'K' => 'b', 'L' => 'l', 'M' => 'I', 'N' => 'V',
				'O' => 'e', 'P' => 'f', 'Q' => 'Z', 'R' => 'J', 'S' => 'A', 'T' => 'o', 'U' => 'D',
				'V' => 'u', 'W' => 'L', 'X' => 'i', 'Y' => 'Y', 'Z' => 'O', 'a' => 'B', 'b' => 'r',
				'c' => 'W', 'd' => 'a', 'e' => 'x', 'f' => 'R', 'g' => 'Q', 'h' => 'X', 'i' => 'c',
				'j' => 'y', 'k' => 'K', 'l' => 'T', 'm' => 'C', 'n' => 'j', 'o' => 'p', 'p' => 'G',
				'q' => 'd', 'r' => 'H', 's' => 'k', 't' => 'z', 'u' => 's', 'v' => 't', 'w' => 'U',
				'x' => 'M', 'y' => 'v', 'z' => 'q', '0' => '2', '1' => '5', '2' => '3', '3' => '1',
				'4' => '0', '5' => '9', '6' => '8', '7' => '7', '8' => '6', '9' => '4',
			],
			'rotor_5' => [
				'A' => 'h', 'B' => 'E', 'C' => 'g', 'D' => 'P', 'E' => 'S', 'F' => 'N', 'G' => 'n',
				'H' => 'w', 'I' => 'F', 'J' => 'm', 'K' => 'b', 'L' => 'l', 'M' => 'I', 'N' => 'V',
				'O' => 'e', 'P' => 'f', 'Q' => 'Z', 'R' => 'J', 'S' => 'A', 'T' => 'o', 'U' => 'D',
				'V' => 'u', 'W' => 'L', 'X' => 'i', 'Y' => 'Y', 'Z' => 'O', 'a' => 'B', 'b' => 'r',
				'c' => 'W', 'd' => 'a', 'e' => 'x', 'f' => 'R', 'g' => 'Q', 'h' => 'X', 'i' => 'c',
				'j' => 'y', 'k' => 'K', 'l' => 'T', 'm' => 'C', 'n' => 'j', 'o' => 'p', 'p' => 'G',
				'q' => 'd', 'r' => 'H', 's' => 'k', 't' => 'z', 'u' => 's', 'v' => 't', 'w' => 'U',
				'x' => 'M', 'y' => 'v', 'z' => 'q', '0' => '2', '1' => '5', '2' => '3', '3' => '1',
				'4' => '0', '5' => '9', '6' => '8', '7' => '7', '8' => '6', '9' => '4',
			],
		],
		'reflector' => [
			'A' => 'h', 'B' => 'E', 'C' => 'g', 'D' => 'P', 'E' => 'S', 'F' => 'N', 'G' => 'n',
			'H' => 'w', 'I' => 'F', 'J' => 'm', 'K' => 'b', 'L' => 'l', 'M' => 'I', 'N' => 'V',
			'O' => 'e', 'P' => 'f', 'Q' => 'Z', 'R' => 'J', 'S' => 'A', 'T' => 'o', 'U' => 'D',
			'V' => 'u', 'W' => 'L', 'X' => 'i', 'Y' => 'Y', 'Z' => 'O', 'a' => 'B', 'b' => 'r',
			'c' => 'W', 'd' => 'a', 'e' => 'x', 'f' => 'R', 'g' => 'Q', 'h' => 'X', 'i' => 'c',
			'j' => 'y', 'k' => 'K', 'l' => 'T', 'm' => 'C', 'n' => 'j', 'o' => 'p', 'p' => 'G',
			'q' => 'd', 'r' => 'H', 's' => 'k', 't' => 'z', 'u' => 's', 'v' => 't', 'w' => 'U',
			'x' => 'M', 'y' => 'v', 'z' => 'q', '0' => '2', '1' => '5', '2' => '3', '3' => '1',
			'4' => '0', '5' => '9', '6' => '8', '7' => '7', '8' => '6', '9' => '4',
		],

	];
	/**
     * Returns a generated machine array.
     *
     * @param  int $rotors. How many rotors to generate.
     * @return array
     */
	public function make($rotors = 3)
	{
		$count = $rotors + 1;
	    $result = array();
	    $result['plugboard'] = $this->MakeRotor();
	    $rotors = array();
	    for ($i=1; $i < $count; $i++) {
	    	$rotors['rotor_'.$i] = $this->MakeRotor();
	    }
	    $result['rotors'] = $rotors;
	    $result['reflector'] = $this->MakeRotor();
	    return $result;
	}
	/**
     * Returns a generated rotor array.
     *
     * @return array
     */
	public function makeRotor()
	{
		$rotor = array();
	    $let = $this->CloneArray($this->letters);
	    $num = $this->CloneArray($this->numbers);
	    shuffle($let);
	    shuffle($num);
	    $letterCount = count($this->letters);
	    for ($i=0; $i < $letterCount; $i++) {
	    	$rotor[$this->letters[$i]] = $let[$i];
	    }
		$numberCount = count($this->numbers);
	    for ($i=0; $i < $numberCount; $i++) {
	    	$rotor[$this->numbers[$i]] = $num[$i];
	    }
	    return $rotor;
	}
	/**
     * Encrypts a character.
     *
     * @param  string $character. The single character to encrypt.
     * @return string
     */
	public function encryptCharacter($character)
	{
	    $result = $character;
	    $result = $this->plugboard[$result];
	    foreach ($this->rotors as $key => $value) {
	    	$result = $value[$result];
	    }
	    $result = $this->reflector[$result];
	    $count = count($this->rotors) - 1;
	    for ($i = $count; $i > 0 ; $i--) {
	    	$result = $this->rotors['rotor_'.$i][$result];
	    }
	    $result = $this->plugboard[$result];
	    return $result;
	}
	/**
     * Decrypts a character.
     *
     * @param  string $character. The single character to decrypt.
     * @return string
     */
	public function decryptCharacter($character)
	{
		$result = $character;
	    $result = array_search($result,  $this->plugboard);
	    foreach ($this->rotors as $key => $value) {
	    	$result = array_search($result, $this->rotors[$key]);
	    }
	    $result = array_search($result, $this->reflector);
	    $count = count($this->rotors) - 1;
	    for ($i = $count; $i > 0 ; $i--) {
	    	$result = array_search($result, $this->rotors['rotor_'.$i]);
	    }
	    $result = array_search($result, $this->plugboard);
	    return $result;
	}
	/**
     * Returns an encrypted string.
     *
     * @param  string $secret. The unencrypted string to send through the machine.
     * @return string
     */
	public function enigmify($secret)
	{
	    $exploded = str_split($secret);
	    $enigmified = '';
	    foreach ($exploded as $character) {
	    	$enigmified .= $this->EncryptCharacter($character);
	    }
	    return $enigmified;
	}
	/**
     * Returns a decrypted string.
     *
     * @param  string $secret. The encrypted string to send through the machine.
     * @return string
     */
	public function denigmify($secret)
	{
	    $exploded = str_split($secret);
	    $denigmified = '';
	    foreach ($exploded as $character) {
	    	$denigmified .= $this->DecryptCharacter($character);
	    }
	    return $denigmified;
	}
	/**
     * Helper function that returns a clone of an array.
     *
     * @param  array $array. The array to clone.
     * @return array
     */
	public function cloneArray($array)
    {
        $ArrayObject = new ArrayObject($arr);
  		return $ArrayObject->getArrayCopy();
    }
    /**
     * Magic get used for accessing the machine.
     *
     * @param  string $name.
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->machine)) {
            return $this->machine[$name];
        }
    }
}
