package com.khenjy.butterfly
import android.app.AlertDialog
import android.app.Dialog
import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import androidx.appcompat.app.AppCompatActivity
import androidx.fragment.app.DialogFragment

class MainActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        // Initialize buttons
        val addButton = findViewById<Button>(R.id.addButton)
        val editButton = findViewById<Button>(R.id.editButton)
        val viewButton = findViewById<Button>(R.id.viewButton)
        val actionButton = findViewById<Button>(R.id.actionButton)

        // Set click listeners for buttons
        addButton.setOnClickListener { showAddItemDialog() }
        editButton.setOnClickListener { showEditItemDialog() }
        viewButton.setOnClickListener { showViewItemDialog() }
        actionButton.setOnClickListener { performAction() }
    }

    private fun showAddItemDialog() {
        val dialogFragment = AddItemDialogFragment()
        dialogFragment.show(supportFragmentManager, "AddItemDialogFragment")
    }

    private fun showEditItemDialog() {
        val dialogFragment = EditItemDialogFragment()
        dialogFragment.show(supportFragmentManager, "EditItemDialogFragment")
    }

    private fun showViewItemDialog() {
        val dialogFragment = ViewItemDialogFragment()
        dialogFragment.show(supportFragmentManager, "ViewItemDialogFragment")
    }

    private fun performAction() {
        // Implement logic to perform action based on the current visible section
        // For example, add, edit, or view items
        // You can handle it within the DialogFragment classes if needed
    }

}

// AddItemDialogFragment
class AddItemDialogFragment : DialogFragment() {

    override fun onCreateDialog(savedInstanceState: Bundle?): Dialog {
        val inflater = requireActivity().layoutInflater
        val view = inflater.inflate(R.layout.activity_main, null)
        val addItemDialog = view.findViewById<View>(R.id.addItemDialog)

        // Initialize dialog form elements
        val closeButton = addItemDialog.findViewById<Button>(R.id.closeButtonAdd)
        closeButton.setOnClickListener {
            dismiss()
        }

        return AlertDialog.Builder(requireActivity())
            .setView(view)
            .create()
    }
}

// EditItemDialogFragment
class EditItemDialogFragment : DialogFragment() {

    override fun onCreateDialog(savedInstanceState: Bundle?): Dialog {
        val inflater = requireActivity().layoutInflater
        val view = inflater.inflate(R.layout.activity_main, null)
        val editItemDialog = view.findViewById<View>(R.id.editItemDialog)

        // Initialize dialog form elements
        val closeButton = editItemDialog.findViewById<Button>(R.id.closeButtonEdit)
        closeButton.setOnClickListener {
            dismiss()
        }

        return AlertDialog.Builder(requireActivity())
            .setView(view)
            .create()
    }
}

// ViewItemDialogFragment
class ViewItemDialogFragment : DialogFragment() {

    override fun onCreateDialog(savedInstanceState: Bundle?): Dialog {
        val inflater = requireActivity().layoutInflater
        val view = inflater.inflate(R.layout.activity_main, null)
        val viewItemDialog = view.findViewById<View>(R.id.viewItemDialog)

        // Initialize dialog form elements
        val closeButton = viewItemDialog.findViewById<Button>(R.id.closeButtonView)
        closeButton.setOnClickListener {
            dismiss()
        }

        return AlertDialog.Builder(requireActivity())
            .setView(view)
            .create()
    }
}
