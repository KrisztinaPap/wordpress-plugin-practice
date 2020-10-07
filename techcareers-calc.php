
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

function techCareersCalculator()
{
    $result = FALSE;
    if ( !empty( $_GET ) )
    {
        switch ( $_GET['op'] )
        {
            case 'addition':
                $opSymbol = '+';
                $result = $_GET['value1'] + $_GET['value2'];
                break;
            case 'subtraction':
                $opSymbol = '-';
                $result = $_GET['value1'] - $_GET['value2'];
                break;
            case 'multiplication':
                $opSymbol = '&times;';
                $result = $_GET['value1'] * $_GET['value2'];
                break;
            case 'division':
                $opSymbol = '&divide;';
                $result = $_GET['value1'] / $_GET['value2'];
                break;
            default:
                break;
        }
    }
    ?>

    <form method="GET" action="#">
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
}