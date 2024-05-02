package com.khenjy.recyclerview;
import android.app.Dialog
import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import androidx.appcompat.app.AppCompatActivity
import androidx.fragment.app.DialogFragment

class MainActivity : AppCompatActivity() {

    private lateinit var addButton: Button
    private lateinit var editButton: Button
    private lateinit var viewButton: Button
    private lateinit var actionButton: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        // Initialize buttons
        addButton = findViewById(R.id.addButton)
        editButton = findViewById(R.id.editButton)
        viewButton = findViewById(R.id.viewButton)
        actionButton = findViewById(R.id.actionButton)

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

    // AddItemDialogFragment
    class AddItemDialogFragment : DialogFragment() {

        override fun onCreateDialog(savedInstanceState: Bundle?): Dialog {
            return super.onCreateDialog(savedInstanceState).apply {
                window?.setBackgroundDrawableResource(android.R.color.transparent)
                setCanceledOnTouchOutside(false)
            }
        }

        override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
            return inflater.inflate(R.layout.activity_main, container, false)
        }

        override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
            super.onViewCreated(view, savedInstanceState)
            // Add your dialog content initialization here
            // For example, find views by id and set up click listeners
            val closeButton = view.findViewById<Button>(R.id.closeButtonAdd)
            closeButton.setOnClickListener {
                dismiss()
            }
        }
    }

    // Similar classes for EditItemDialogFragment and ViewItemDialogFragment
    // EditItemDialogFragment
    class EditItemDialogFragment : DialogFragment() {

        override fun onCreateDialog(savedInstanceState: Bundle?): Dialog {
            return super.onCreateDialog(savedInstanceState).apply {
                window?.setBackgroundDrawableResource(android.R.color.transparent)
                setCanceledOnTouchOutside(false)
            }
        }

        override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
            return inflater.inflate(R.layout.activity_main, container, false)
        }

        override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
            super.onViewCreated(view, savedInstanceState)
            // Add your dialog content initialization here
            // For example, find views by id and set up click listeners
            val closeButton = view.findViewById<Button>(R.id.closeButtonEdit)
            closeButton.setOnClickListener {
                dismiss()
            }
        }
    }

    // ViewItemDialogFragment
    class ViewItemDialogFragment : DialogFragment() {

        override fun onCreateDialog(savedInstanceState: Bundle?): Dialog {
            return super.onCreateDialog(savedInstanceState).apply {
                window?.setBackgroundDrawableResource(android.R.color.transparent)
                setCanceledOnTouchOutside(false)
            }
        }

        override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
            return inflater.inflate(R.layout.activity_main, container, false)
        }

        override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
            super.onViewCreated(view, savedInstanceState)
            // Add your dialog content initialization here
            // For example, find views by id and set up click listeners
            val closeButton = view.findViewById<Button>(R.id.closeButtonView)
            closeButton.setOnClickListener {
                dismiss()
            }
        }
    }

}
