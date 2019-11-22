package be.unamur.info.algo2;

import org.junit.Rule;
import org.junit.Test;
import org.junit.rules.TemporaryFolder;
import org.junit.rules.TestRule;
import org.junit.rules.TestWatcher;
import org.junit.runner.Description;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;

import static org.hamcrest.MatcherAssert.assertThat;
import static org.junit.Assert.*;

public class Algo2Problem{{ $key }}Test {

    private static final Logger LOG = LoggerFactory.getLogger(Algo2Problem{{ $key }}Test.class);

    private String getFileText(String input) throws IOException {
        return new String(Files.readAllBytes(Paths.get(input)));
    }
    @Rule
    public TemporaryFolder testFolder = new TemporaryFolder(); // Create a temporary folder for outputs deleted after tests

    @Rule
    public TestRule watcher = new TestWatcher() { // Prints message on logger before each test
        @Override
        protected void starting(Description description) {
            LOG.info(String.format("Starting test: %s()...",
                    description.getMethodName()));
        }
    };

@foreach ($probleme as $index => $test)

    /*
    | Test proposé par {{ $test->user->name }}
    */
    @Test
    public void problem_{{ $test->probleme->id }}_test_{{ $index+1 }}_{{ $test->resultat != 'null' ? 'ok' : 'fail' }}_{{ str_replace('-', '_', Str::slug($test->nom)) }}() throws Exception {

        String input = "src/test/resources/problem{{ $test->probleme->id }}/{{ Str::slug($test->nom) }}.txt";

        String[] result = Main.problem_{{ $test->probleme->id }}(getFileText(input));
    @if ($test->resultat != 'null')
    String[] s_result = {!! $test->resultat !!};

        assertArrayEquals(s_result, result);
@else

        assertNull(result);
@endif
    }

    /*
    | Test proposé par {{ $test->user->name }}
    */
    @Test
    public void problem_{{ $test->probleme->id }}_test_{{ $index+1 }}_naive_{{ $test->resultat != 'null' ? 'ok' : 'fail' }}_{{ str_replace('-', '_', Str::slug($test->nom)) }}() throws Exception {

        String input = "src/test/resources/problem{{ $test->probleme->id }}/{{ Str::slug($test->nom) }}.txt";

        String[] result = Main.problem_{{ $test->probleme->id }}_naive(getFileText(input));
    @if ($test->resultat != 'null')
    String[] s_result = {!! $test->resultat !!};

        assertArrayEquals(s_result, result);
@else

        assertNull(result);
@endif
    }

@endforeach

}
