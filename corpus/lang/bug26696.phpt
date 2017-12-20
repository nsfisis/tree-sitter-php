==========
Bug #26696 (string index in a switch() crashes with multiple matches)
==========

<?php

$str = 'asdd/?';
$len = strlen($str);
for ($i = 0; $i < $len; $i++) {
	switch ($str[$i]) {
		case '?':
			echo "OK\n";
			break;
	}
}

$str = '*';
switch ($str[0]) {
	case '*';
		echo "OK\n";
		break;
	default:
		echo 'Default RAN!';
}

?>

---

(program  (expression_statement (assignment_expression (simple_variable (variable_name (name))) (string))) (expression_statement (assignment_expression (simple_variable (variable_name (name))) (function_call_expression (qualified_name (name)) (arguments (simple_variable (variable_name (name))))))) (for_statement (assignment_expression (simple_variable (variable_name (name))) (float)) (binary_expression (simple_variable (variable_name (name))) (simple_variable (variable_name (name)))) (update_expression (simple_variable (variable_name (name)))) (compound_statement (switch_statement (subscript_expression (dereferencable_expression (simple_variable (variable_name (name)))) (simple_variable (variable_name (name)))) (case_statement (string) (echo_statement (string)) (break_statement))))) (expression_statement (assignment_expression (simple_variable (variable_name (name))) (string))) (switch_statement (subscript_expression (dereferencable_expression (simple_variable (variable_name (name)))) (float)) (case_statement (string) (echo_statement (string)) (break_statement)) (default_statement (echo_statement (string)))))

