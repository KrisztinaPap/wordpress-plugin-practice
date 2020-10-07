

<?php
/**
 * Plugin Name:       TECHCareers Calculator Plugin
 * Plugin URI:        https://TECHCareers.ca
 * Description:       A simple PHP calculator
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            TECHCareers instructor (classroom lesson project)
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

// CODE BORROWED FROM WARREN UHRICH'S LESSON NOTES (INSTRUCTOR AT TECHCAREERS) ---------> 

// if content contains first, second (function) will run
add_shortcode( 'techcareers-calc', 'techCareersCalculator'); 

function techCareersCalculator()
{
    $result = FALSE;
    if ( !empty( $_POST ) )
    {
        switch ( $_POST['op'] )
        {
            case 'addition':
                $opSymbol = '+';
                $result = $_POST['value1'] + $_POST['value2'];
                break;
            case 'subtraction':
                $opSymbol = '-';
                $result = $_POST['value1'] - $_POST['value2'];
                break;
            case 'multiplication':
                $opSymbol = '&times;';
                $result = $_POST['value1'] * $_POST['value2'];
                break;
            case 'division':
                $opSymbol = '&divide;';
                $result = $_POST['value1'] / $_POST['value2'];
                break;
            default:
                break;
        }
    }

    // OUTPUT BUFFER
    // Hold onto the ECHOs, and don't send yet.
    ob_start();
    ?>
    <form method="POST" action="#">
    <label for="num1">
        Enter first operand:
        <input 
            id="num1" 
            name="value1"
            type="number"
            value="">
    </label>
    <label for="operator">
        Select an operator:
        <select id="operator" name="op">
            <option value="addition">+</option>
            <option value="subtraction">-</option>
            <option value="multiplication">&times;</option>
            <option value="division">&divide;</option>
        </select>
    </label>
    <label for="num2">
        Enter second operand:
        <input 
            id="num2" 
            name="value2"
            type="number"
            value="">
    </label>
    <input type="submit" value="Calculate!">
    </form>

    <?php if ( $result != FALSE ) : ?> 
    <p>
    Your result for your calculation is:
        <?php echo $result; ?>
    </p>
    <?php endif;

    // END OUTPUT BUFFER
    // Everything after this point will be echoes like normal again.
    $outputString = ob_get_clean();

    // shortcodes will output should RETURN a STRING.
    return $outputString;
}

/** END OF BORROWED CODE */  